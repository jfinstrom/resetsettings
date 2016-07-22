<?php
namespace FreePBX\modules;


class Resetsettings implements \BMO {
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}
		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
	}
	public function install(){
		$this->callReset();
	}
	public function uninstall() {}
	public function backup() {}
	public function restore($backup) {}
	public function doConfigPageInit($page) {}
	public function callReset(){
		$fix = array(
			"BRAND_ALT_JS",
			"BRAND_CSS_ALT_MAINSTYLE",
			"BRAND_CSS_ALT_POPOVER",
			"BRAND_CSS_CUSTOM",
			"BRAND_FREEPBX_ALT_FOOT",
			"BRAND_FREEPBX_ALT_LEFT",
			"BRAND_IMAGE_FAVICON",
			"BRAND_IMAGE_FREEPBX_FOOT",
			"BRAND_IMAGE_FREEPBX_LINK_FOOT",
			"BRAND_IMAGE_FREEPBX_LINK_LEFT",
			"BRAND_IMAGE_SPONSOR_FOOT",
			"BRAND_IMAGE_SPONSOR_LINK_FOOT",
			"BRAND_IMAGE_TANGO_LEFT",
			"BRAND_SPONSOR_ALT_FOOT",
			"BRAND_TITLE",
			"MODULE_REPO",
			"DASHBOARD_FREEPBX_BRAND"
			);
		$this->FreePBX->Config->reset_conf_settings($fix,true);
	}

	public static function myDialplanHooks() { return true; }
	public function doDialplanHook(&$ext, $engine, $priority) {
		$this->callReset();
	}
}
