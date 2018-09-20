Neostrada APIv2 Library
=========================

__Getting started__

The recommended way to install APIv2 is through [Composer](https://getcomposer.org/)
```
# Install Composer
curl -sS https://getcomposer.org/installer | php
```


Next, run the Composer command to install the latest stable version of APIv2:

_(Neostrada APIv2 is still under development. We recommend installing dev-master)_
```
composer require neostrada/apiv2 dev-master
```

__Or clone the repository via__
```
git clone https://github.com/neostrada/neostrada-apiv2.git
```

__Define your token__

Add your access token to the constant TOKEN in the Config.php file

```
require_once __DIR__ . "/../../vendor/autoload.php";


$neo = new \Neostrada\Client\NeoClient();
$neo->setToken('TOKEN HERE');
```

## Support

* If you need any help with implementing the APIv2, please contact our support team  - [Neostrada](mailto:support@neostrada.nl)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details