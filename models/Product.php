<?php
class Product {
    public $_title;
    public $_price;
    public $_id;

    public function __construct($title = "", $price = "", $id = 0) {
        $this->_title = $title;
        $this->_price = $price;
        $this->_id = $id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($value) {
        $this->_title = $value;
    }

    public function getPrice() {
        return $this->_price;
    }

    public function setPrice($value) {
        $this->_price = $value;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = $value;
    }

    public function getCardUi() {
        echo "
            <div class=\"col-md-4 mb-3\">
                <div class=\"card border\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">" . $this->_title . "</h5>
                        <p class=\"card-text\"><b>Price:</b> $" . $this->_price . "<br></p>
                        <div class='d-flex w-100 justify-content-around'>
                            <a id='delete' data-id='" . $this->_id . "' style='width: 40%' class='deleteBtn btn btn-secondary'>Delete</a>
                            <a id='edit'  data-id='" . $this->_id . "' style='width: 40%' class='editBtn btn btn-secondary'>Edit</a>
                        </div>
                    </div>
                </div>
            </div>";
    }
}
?>
