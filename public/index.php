$builder = new DI\ContainerBuilder();
$userManager = $container->get('UserManager');
$container = $builder->build();
