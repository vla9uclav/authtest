<?php 

class Database
{
    private const JSON_FILE_PATH = __DIR__ . "/../config/jsonDatabase.json";

    // При инициализации проверит существование файла json и создаст, если отстутствует
    public function __construct(){
        
        // Проверяет есть ли файл json, если нет, то создает его
        if(!$this->fileDbExists()){
            file_put_contents($this::JSON_FILE_PATH, '');
        }
    }

    /**  Вставляет значение в файл json */
    public function insert($data){

        // Проверяет есть ли файл json
        if ($this->fileDbExists()) {

            // Если данные есть, то вставляем их в конец файла
            if(!empty($data)){
                $jsonFile = file_get_contents($this::JSON_FILE_PATH);
                $arrayAssoc = json_decode($jsonFile, true);
                $arrayAssoc[] = $data;

                file_put_contents($this::JSON_FILE_PATH, json_encode($arrayAssoc, JSON_FORCE_OBJECT));
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    /**  Возвращает строку или массив строк из файла json */
    public function select(array $params = null, bool $returnFullRow = false){

        // Проверяет есть ли файл json
        if($this->fileDbExists()){

            $jsonFile = file_get_contents($this::JSON_FILE_PATH);
            $arrayAssoc = json_decode($jsonFile, true);

            // Если указан параметр, то производит поиск по параметру
            if(!empty($params) & !empty($arrayAssoc)){

                foreach ($arrayAssoc as $key => $value) {

                    // Сравнивает массивы и возвращает найденные совпадения как массив
                    $resultArray = array_intersect($params, $value);

                    if (!empty($resultArray)) {

                        // Определяет соответствует ли массив параметрам
                        if ($this->arrayIsCorrespondsToParams($resultArray, $params) === false) {
                            return false;
                        }else{
                            if ($returnFullRow) {

                                // Возвращает найденную строку
                                return $arrayAssoc[$key];
                            } else {

                                // Возвращает найденные значения
                                return $resultArray;
                            }
                        }
                    }
                }

                return false;
            }

            // Если ничего не указано, возвращаем массив всех строк
            return $arrayAssoc;

        }else{
            return false;
        }
    }

    /** Возвращает хэшированную строку */
    public function getHashedString(string $value){
        return md5(md5($value . "s-3Y9J3!p"));
    }

    /** Проверяет есть ли файл json */
    private function fileDbExists(){
        if(file_exists($this::JSON_FILE_PATH)){
            return true;
        }else{
            return false;
        }
    }

    /** Определяет соответствует ли массив параметрам */
    private function arrayIsCorrespondsToParams(array $array, array $params){

        foreach ($params as $key => $value) {
            // Проверяет есть ли ключ параметра в переданном массиве 
            if (!empty($array[$key])) {

                // Проверяет значения между массивами по ключу
                if($value !== $array[$key]){
                    return false;
                }
            }else{
                return false;
            }
        }

        return true;
    }
}