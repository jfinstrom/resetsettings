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
		\out(_('Resetting Settings'));
		$this->callReset();
		$nt = \notifications::create();
		$rawname = 'resetsettings';
		$uid = 'resethappened';
		$display_text = _("Settings Reset");
		$extended_text = _("The Reset settings module has reset some of your advanced settings. Please refresh your signatures in the CLI");
		if(!$nt->exists($rawname, $uid)) {
			$nt->add_notice($rawname, $uid, $display_text, $extended_text,'', true, true);
		}
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
		$mod = \module_functions::create();
		$mod->uninstall('resetsettings', true);
	}
}
