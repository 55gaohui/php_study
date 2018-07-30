
<?php
class Person{
    private $name;
    private $sex;
    private $age;
    public function __get($property_name){
        echo "在直接获取私有属性值的时候，自动调用了这个__get()方法<br>";
        if (isset($this->$property_name)) {
            return ($this->$property_name);
        } else {
            return null;
        }
    }
    public function __set($property_name, $value) {
        echo "在直接设置私有属性值的时候，自动调用了这个__set()方法为私有属性赋值<br>";
        $this->$property_name = $value;
    }
}
$p1 = new Person();
$p1->name = "小烟";
$p1->sex = "男";
$p1->age = 23;
echo "姓名：".$p1->name."<br>";
echo "性别：".$p1->sex."<br>";
echo "年龄：".$p1->age."<br>"; 