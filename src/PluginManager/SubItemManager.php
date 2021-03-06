<?php

namespace Drupal\commerce_sub\PluginManager;

use Drupal\Component\Plugin\Factory\DefaultFactory;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
* Manages Discovery and instantiation for SubscriptionItem plugins.
*/
class SubItemManager extends DefaultPluginManager {

    /**
     * The entity type manager.
     *
     * @var \Drupal\Core\Entity\EntityTypeManagerInterface
     */
    protected $entityTypeManager;

    /**
     * Constructs a new LicenseResourceManager object.
     *
     * @param \Traversable $namespaces
     *   An object that implements \Traversable which contains the root paths
     *   keyed by the corresponding namespace to look for plugin implementations.
     * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
     *   Cache backend instance to use.
     * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
     *   The module handler to invoke the alter hook with.
     */
    public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {

      parent::__construct(
        'Plugin/Commerce/SubItem',
        $namespaces,
        $module_handler,
        'Drupal\commerce_sub\Plugin\Commerce\SubItem\SubItemInterface',
        'Drupal\commerce_sub\Annotation\SubItem'
      );

      $this->alterInfo('commerce_sub_sub_item_info');
      $this->setCacheBackend($cache_backend, 'commerce_sub_sub_item_plugins');

    }

}
