<?php

class search{
  
  //EDITIONS MADE BY: Tej Pal Sharma
  //START::
  public static function searchTeachersByTimeslots($timeslotsString){
    /*
    Function to search teachers Based on timeslots availability (also takes care of wiziqLimit)
    INPUT:
      ACCEPTS input as a string like "1-11-23-33" where numbers 1-48 represents all 48 timeslots (these are 1 indexed)
      Accepts a empty string to get teachers ids (of teachers who have free slot/s in future) irrespective of timeslot.
    Output:
      Returns an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA().
    */
    global $_ginfo;
    $timeslotsArr = intexplode_t2('-',$timeslotsString,$_ginfo['timeslotMaxLimit']);
    $parametersArr = array();
    $parametersArr['currenttimestamp'] = time();
    $allPresent = checkPresenceOfEveryValueFromStartToEnd($_ginfo['timeslotMinLimit'], $_ginfo['timeslotMaxLimit'], $timeslotsArr);
    if(empty($timeslotsArr) || $allPresent){
      $query = "SELECT DISTINCT tid from timeslot WHERE starttime > {currenttimestamp} ";
      return array('query'=>$query,'parama'=>$parametersArr);
    }
    else{
      $query = "Select searchbytimeslots_table.tid from (".gtable("alltimeslotsfromcurrenttime").")searchbytimeslots_table where (";
      $queryArr = array();
      foreach ($timeslotsArr as $key=>$value) {
        $queryArr[] = " ( searchbytimeslots_table.starttime%(24*3600) = {timeslotsDisplacement".$key."} AND searchbytimeslots_table.numbooked < {wiziqlimit} )";
        $parametersArr['timeslotsDisplacement'.$key] = 1800*($value-1);
      }
      $parametersArr['wiziqlimit'] = $_ginfo["wiziqlimit"];
      $query .= implode(" OR ", $queryArr).") ";
      $query .= " group by searchbytimeslots_table.tid ";
      return array("query"=>$query, "parama"=>$parametersArr);
    }
  }
    
  public static function filterTeachersByPrice($categoryString=""){
    /*
    Function to search for teachers using price per hour filter.
    Arguments::
      string of {$_ginfo['priceCategory']} KEYS as defined in ROOT/includes/data.php, seperated by '-'
      example 1-3-5
      An empty String if no bound on price
    Returns 
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
      For this function The {parama} array is an empty array.
    */

    return Fun::filteredResultsQuery('price','subjects','priceCategory',$categoryString,array('tid'),'tid');
  }

  public static function filterTeachersByDurationOfCourse($categoryString){
    /*
    Function to search for teachers using price per hour filter.
    Arguments::
      string of {$_ginfo['durationCategory']} KEYS as defined in ROOT/includes/data.php, seperated by '-'
      example 1-3-5
      An empty String if no bound on price
    Returns 
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA()
      For this function The {parama} array is an empty array.
    */
    return Fun::filteredResultsQuery('timer','subjects','durationCategory',$categoryString,array('tid'),'tid');
  }
  public static function filterTeachersByLanguage($langString){
    /*
    Function to build a query to get tids of teachers who teach in language specified in {langString}
    Arguments:
      langString: '-' seperated String of language ids. an empty string if not to get all tids.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $langIds = intexplode('-',$langString);
    $result = Fun::queryToFetchAcolumnFromTableOnLikeCondition('teachers','tid','lang',$langIds,'tid');
    return $result;
  }
  public static function filterTeachersByClass($classString){
    /*
    Function to build a query to get tids of teachers who teach classes specified in {classString}
    Arguments:
      classString: '-' seperated String of class ids. an empty string if not to get all tids.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $classIds = intexplode('-',$classString);
    $result = Fun::queryToFetchAcolumnFromTableOnCondition('all_classes','id','id',$classIds);
    return $result;
  }
  public static function filterTeachersBySubjects($subjectString){
    /*
    Function to build a query to get tids of teachers who teach subjects specified in {subjectString}
    Arguments:
      subjectString: '-' seperated String of subject ids. an empty string if not to get all tids.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $subjectIds = intexplode('-',$subjectString);
    $result = Fun::queryToFetchAcolumnFromTableOnCondition('all_subjects','id','id',$subjectIds);
    return $result;
  }
  public static function filterTeachersByTopics($topicString){
    /*
    Function to build a query to get tids of teachers who teach topics specified in {topicString}
    Arguments:
      topicString: '-' seperated String of topic ids. an empty string if not to get all tids.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $topicIds = intexplode('-',$topicString);
    $result = Fun::queryToFetchAcolumnFromTableOnCondition('all_topics','id','id',$topicIds);
    return $result;
  }
  public static function queryToGetTableAllDataKeywordsCanBeFoundIn($dummyTableName = array('TableAllDataKeywordsCanBeFoundInDummyTable1','TableAllDataKeywordsCanBeFoundInDummyTable2')){
    /*
    Function to build a query to get join of subjects, all_classes, all_subjects, all_topics into a dummy table in which searches can be performed.
    Argument:
      (OPTIONAL) dummyTableName:  array having names of two intermediary dummy tables.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $parametersArr = array();
    $result = Fun::joinTwoTablesOnForeignKeyQuery('subjects','all_classes','c_id','id',array('tid','c_id','s_id','t_id','timer','price'),array('classname'));
    $query1 = $result['query'];
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = Fun::joinTwoTablesOnForeignKeyQuery($query1,'all_subjects','s_id','id',array('tid','c_id','classname','s_id','t_id','timer','price'),array('subjectname'),0,$dummyTableName[0]);
    $query2 = $result['query'];
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $query  = Fun::joinTwoTablesOnForeignKeyQuery($query2,'all_topics','t_id','id',array('tid','c_id','classname','s_id','subjectname','t_id','timer','price'),array('topicname'),0,$dummyTableName[1])['query'];

    return array('query'=>$query,'parama'=>array());
  }

  public static function queryToGetTIDforMatchedKeywords($keywordsArr,$dummyTableName="TIDforMatchedKeywordsDummyTable") {
    /*
    Function to build query to search for keywords in {keywordsArr}
    Arguments:
      keywordsArr  => array containing all the keywords generated by {self::generateKeywordsFromSearchStrings()}
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA(). 
    */
    $parametersArr = array();
    $query  = "SELECT DISTINCT  ".$dummyTableName."."."tid FROM (";
    $result = self::queryToGetTableAllDataKeywordsCanBeFoundIn();
    $query .= $result['query'];
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $query .= ")".$dummyTableName." WHERE ";
    foreach ($keywordsArr as $key=>$value) {
      $parametersArr['keyword'.$key] = $value;
      $query .= " ( ".$dummyTableName.".classname like concat('%',{keyword".$key."},'%'  ) OR ";
      $query .= "   ".$dummyTableName.".subjectname like concat('%',{keyword".$key."},'%') OR ";
      $query .= "   ".$dummyTableName.".topicname like concat('%',{keyword".$key."},'%'  )) AND ";
    }
    $query = substr($query,0,strlen($query)-4);
    return array('query'=>$query,'parama'=>$parametersArr);
  }

  public static function genrateKeywordsFromSearchStrings($searchString) {
    /*
    Function generates Keywords from search string on basis of spaces and any alphabet other than alphnumeric characters.
    Arguments:
      searchString:   A string entered by user(mostly) to search for.
    Returns:
      An array containg all the generated keywords which can be searched seperately.
    */
    $searchString = preg_replace("/[^a-zA-Z 0-9]+/"," ",$searchString);
    $searchString = trim($searchString);
    $keywordsArr  = explode(" ",$searchString);
    for($i=0;$i<count($keywordsArr);$i++)
      $keywordsArr[$i] = strtolower($keywordsArr[$i]);
    return $keywordsArr;
  }
  public static function queryToSearchFor($searchString=""){
    /*
    Function builds a query to search for a string.
    Arguments:
      searchString:   A string entered by user(mostly) to search for.
    Returns:
      an associative array with keys 'query' whose value is the query and 'parama' whose value is an array(having values to replace in query) to pass to function Sqle::getA().
    */
    $keywordsArr = self::genrateKeywordsFromSearchStrings($searchString);
    return self::queryToGetTIDforMatchedKeywords($keywordsArr);
  }
  public static function queryToGetFilteredSearchResults($classString,$subjectString,$topicString,$langString,$priceCategoryString,$durationCategoryString,$timeslotsString,$searchString=""){
    /*
    Function builds a query to search for a string.
    Arguments:
      classString:      string of class ids seperated by '-'
                        OR an empty string if no such preference,
      subjectString:    string of subject ids seperated by '-'
                        OR an empty string if no such preference,
      topicString:      string of topic ids seperated by '-'
                        OR an empty string if no such preference,
      $langString:      sting of language ids seperated by '-'
                        OR an empty string if no such preference,
      priceCategoryString: string of {$_ginfo['priceCategory']} KEYS as defined in ROOT/includes/data.php, seperated by '-'
                        example 1-3-5
                        An empty String if no bound on price
      durationCategoryString:  string of {$_ginfo['durationCategory']} KEYS as defined in ROOT/includes/data.php, seperated by '-'
                        example 1-3-5
                        An empty String if no bound on duration
      timeslotString => -1 if no slot preference otherwise sting of timeslotIds (1 indexed) seperated by '-' example : '1-4-6-8-23-48',
      searchString ===> string to look for, an empty string looks for matching constraints only.  
    The function Returns an associative array with keys:
      query => It is query whose results are the distinct tids (which identify Teachers) which matched the search
      parama => it is again an associative array which contain values to be inserted in query while binding parameters, this array should be passed as it is as second parameter to Sqle::getA function.
    */
    $parametersArr = array();
    $query  = "";
    $result = self::queryToSearchFor($searchString);
    $query .= $result['query'];
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::searchTeachersByTimeslots($timeslotsString);
    $query .= " AND  TIDforMatchedKeywordsDummyTable.tid IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersByPrice($priceCategoryString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.tid IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersByDurationOfCourse($durationCategoryString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.tid IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersByLanguage($langString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.tid IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersByClass($classString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.c_id IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersBySubjects($subjectString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.s_id IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    $result = self::filterTeachersByTopics($topicString);
    $query .= " AND TIDforMatchedKeywordsDummyTable.t_id IN (".$result['query'].") ";
    foreach ($result['parama'] as $key => $value) {
      $parametersArr[$key] = $value;
    }
    return array('query'=>$query,'parama'=>$parametersArr);
  }
}
?>