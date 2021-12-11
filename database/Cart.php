<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }
    //to get user_id and item_id and insert into cart table
    public function addToCart($user_id,$item_id, $quantity){
        if (isset($user_id) && isset($item_id) ){
            $params = array(
                "user_id" => $user_id,
                "item_id" => $item_id,
                "quantity" => $quantity
            );
            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }
    // delete cart item using
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    // Calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum=0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('.%.2f',$sum);
        }
    }
    // get item_id of shopping cart list


    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }
    // Save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM $fromTable WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id}";
            // execute multiple query
            $result = $this->db->con->multi_query($query);
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    public function calculateCartTotal($cart){
        $total = 0;
        foreach($cart as $item){
            //get qty
            $qty = 0;
            $price = 0;
            //get price
            $subTotal = $qty * $price;
            $total += $subTotal;
        }
        return $total;
    }
}