<?php

/**
 * Class Manager 
 * Model for manager actions
 */
class Manager {  

     /**
     * Adds news
     * @param array $options news info array
     * @return mixed added string id or 0
     */
    public static function createNews($options) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO news '
                . '(title, short_content, content, category)'
                . 'VALUES '
                . '(:title, :short_content, :content, :category)';

        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_STR);
      
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }
    
     /**
     * Update news by id
     * @param integer $id news id
     * @param array $options news info array
     * @return boolean 
     */
    public static function updateNewsById($id, $options) {
        
        $db = Db::getConnection();

        $sql = "UPDATE news
            SET 
                title = :title, 
                short_content = :short_content, 
                content = :content, 
                category = :category
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_STR);
        
        return $result->execute();
    }

    
      /**
     * Delete news by id
     * @param integer $id news id
     * @return boolean 
     */
    public static function deleteNewsById($id) {
        $db = Db::getConnection();

        $sql = 'DELETE FROM news WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}
