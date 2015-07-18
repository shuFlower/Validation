## 数据验证包
本项目fork 自 [https://github.com/Respect/Validation](https://github.com/Respect/Validation)

## 修改
- 1. 增加多语言
- 2. 支持数组验证

例：

    use Respect\Validation\Exceptions\ValidationException;
    use Respect\Validation\Validator as v;
    
    include "./vendor/autoload.php";
    
    
    $validator = v::attribute('name', v::string()->notEmpty())
        ->attribute('email', v::email()->notEmpty())
    ;
    
    try {
    
        $validator->check(array(
            'name' => 'leo',
            'email' => ''
        ));
    
    } catch (ValidationException $e) {
        echo $e->getMainMessage();
    }
    
