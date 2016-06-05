<?php


class Model {
  /**
   * database var
   * @var PDO
   */
  private $db;

  /**
   * Pass the $db object from app object
   * @param $db
   */

  function __construct($db) {
    $this->db = $db;
  }

  /**
   * Get list of current articles
   */
  public function getAllArticles() {
    $sql = "SELECT id, title FROM pages";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }

  /**
   * Add new article
   */
  public function addNewArticle($title, $url, $blurb, $body) {
    $sql  = "INSERT INTO pages (title, url, blurb, body) ";
    $sql .= "VALUES (:title, :url, :blurb, :body)";
    $query = $this->db->prepare($sql);
    $params = array(':title' => $title, ':url' => $url, ':blurb' => $blurb, ':body' => $body);
    $query->execute($params);
  }
}