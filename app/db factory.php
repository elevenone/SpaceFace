class DbFactory {
    private $db;
    
    public function getDb() {
        if (!$this->db) {
            $this->db = new DbConnection();
        }
        
        return $this->db;
    } 
}