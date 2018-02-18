<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\Lib;

use SuperfoodElatedNamespace\Modules\Shortcodes\Accordion\Accordion;
use SuperfoodElatedNamespace\Modules\Shortcodes\AccordionTab\AccordionTab;
use SuperfoodElatedNamespace\Modules\Shortcodes\AnimationHolder\AnimationHolder;
use SuperfoodElatedNamespace\Modules\Shortcodes\Banner\Banner;
use SuperfoodElatedNamespace\Modules\Shortcodes\BlogList\BlogList;
use SuperfoodElatedNamespace\Modules\Shortcodes\Button\Button;
use SuperfoodElatedNamespace\Modules\Shortcodes\CallToAction\CallToAction;
use SuperfoodElatedNamespace\Modules\Shortcodes\ClientsBoxes\ClientsBoxes;
use SuperfoodElatedNamespace\Modules\Shortcodes\ClientsBoxesItem\ClientsBoxesItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\ClientsCarousel\ClientsCarousel;
use SuperfoodElatedNamespace\Modules\Shortcodes\ClientsCarouselItem\ClientsCarouselItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\Countdown\Countdown;
use SuperfoodElatedNamespace\Modules\Shortcodes\Counter\Counter;
use SuperfoodElatedNamespace\Modules\Shortcodes\Dropcaps\Dropcaps;
use SuperfoodElatedNamespace\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use SuperfoodElatedNamespace\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\FrameSlider\FrameSlider;
use SuperfoodElatedNamespace\Modules\Shortcodes\GalleryBlocks\GalleryBlocks;
use SuperfoodElatedNamespace\Modules\Shortcodes\GoogleMap\GoogleMap;
use SuperfoodElatedNamespace\Modules\Shortcodes\Highlight\Highlight;
use SuperfoodElatedNamespace\Modules\Shortcodes\Icon\Icon;
use SuperfoodElatedNamespace\Modules\Shortcodes\IconListItem\IconListItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\IconWithText\IconWithText;
use SuperfoodElatedNamespace\Modules\Shortcodes\ImageGallery\ImageGallery;
use SuperfoodElatedNamespace\Modules\Shortcodes\ImageWithText\ImageWithText;
use SuperfoodElatedNamespace\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use SuperfoodElatedNamespace\Modules\Shortcodes\ItemShowcaseItem\ItemShowcaseItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\MessageBox\MessageBox;
use SuperfoodElatedNamespace\Modules\Shortcodes\PieChart\PieChart;
use SuperfoodElatedNamespace\Modules\Shortcodes\PricingTables\PricingTables;
use SuperfoodElatedNamespace\Modules\Shortcodes\PricingTable\PricingTable;
use SuperfoodElatedNamespace\Modules\Shortcodes\ProgressBar\ProgressBar;
use SuperfoodElatedNamespace\Modules\Shortcodes\ProductInfo\ProductInfo;
use SuperfoodElatedNamespace\Modules\Shortcodes\ProductList\ProductList;
use SuperfoodElatedNamespace\Modules\Shortcodes\ProductListCarousel\ProductListCarousel;
use SuperfoodElatedNamespace\Modules\Shortcodes\ProductListSimple\ProductListSimple;
use SuperfoodElatedNamespace\Modules\Shortcodes\RestaurantMenu\RestaurantMenu;
use SuperfoodElatedNamespace\Modules\Shortcodes\RestaurantItem\RestaurantItem;
use SuperfoodElatedNamespace\Modules\Shortcodes\SectionTitle\SectionTitle;
use SuperfoodElatedNamespace\Modules\Shortcodes\Separator\Separator;
use SuperfoodElatedNamespace\Modules\Shortcodes\SocialShare\SocialShare;
use SuperfoodElatedNamespace\Modules\Shortcodes\Tabs\Tabs;
use SuperfoodElatedNamespace\Modules\Shortcodes\Tab\Tab;
use SuperfoodElatedNamespace\Modules\Shortcodes\Team\Team;
use SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSlider\VerticalSplitSlider;
use SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel;
use SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel;
use SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader
{
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {
    }

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {
    }

    /**
     * Private clone because of Singletone
     */
    private function __clone() {
    }

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if (self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if (!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new Accordion());
        $this->addShortcode(new AccordionTab());
        $this->addShortcode(new AnimationHolder());
        $this->addShortcode(new Banner());
        $this->addShortcode(new BlogList());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new ClientsBoxes());
        $this->addShortcode(new ClientsBoxesItem());
        $this->addShortcode(new ClientsCarousel());
        $this->addShortcode(new ClientsCarouselItem());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new FrameSlider());
        $this->addShortcode(new GalleryBlocks());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconListItem());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new ImageWithText());
        $this->addShortcode(new ItemShowcase());
        $this->addShortcode(new ItemShowcaseItem());
        $this->addShortcode(new MessageBox());
        $this->addShortcode(new PieChart());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProgressBar());
        if (superfood_elated_is_woocommerce_installed()) {
            $this->addShortcode(new ProductInfo());
            $this->addShortcode(new ProductList());
            $this->addShortcode(new ProductListCarousel());
            $this->addShortcode(new ProductListSimple());
        }
        $this->addShortcode(new RestaurantMenu());
        $this->addShortcode(new RestaurantItem());
        $this->addShortcode(new SectionTitle());
        $this->addShortcode(new Separator());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new Tabs());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new VerticalSplitSlider());
        $this->addShortcode(new VerticalSplitSliderLeftPanel());
        $this->addShortcode(new VerticalSplitSliderRightPanel());
        $this->addShortcode(new VerticalSplitSliderContentItem());
    }

    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();