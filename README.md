```

 .88888.                    dP       d8888b.                   oo            dP    a8888a  
d8'   `88                   88           `88                                 88   d8' ..8b
88        .d8888b. .d8888b. 88  .dP   aaad8' 88d888b. .d8888b. dP 88d888b. d8888P 88 .P 88
88   YP88 88ooood8 88ooood8 88888"       `88 88'  `88 88'  `88 88 88'  `88   88   88 d' 88
Y8.   .88 88.  ... 88.  ... 88  `8b.     .88 88.  .88 88.  .88 88 88    88   88   Y8'' .8P
 `88888'  `88888P' `88888P' dP   `YP d88888P 88Y888P' `88888P' dP dP    dP   dP    Y8888P  
                                             88                                           
```

###This module is a personal release and is not supported by my employer or the FreePBX project.

#About
This module resets select advanced settings. This is to allow people to fix systems that may not be
getting updates. Some updates may be unavailible due to 3rd party services that are either no longer
maintaining there updates, or are being slow to update. This can be a security risk.
This module will reset these settings on install and remove itself on reload.

#Installing
* Download https://github.com/Jfinstrom/resetsettings/archive/master.tar.gz
* Go to http://YOURPBX/admin/config.php?display=modules
* Click "Upload Module"
* Type: Choose Upload from hard disk
* Click browse and choose "resetsettings-master.tar.gz from your upload folder.
* Click "Upload"
* Go back to http://YOURPBX/admin/config.php?display=modules
* Under "Applications" expand "Reset Settings" and click on the "Install" action.
* Go to the bottom of the page and click "Process"
* After install go to SSH and type 'amportal a ma refreshsignatures'

This should reset your system back to a state where you can receive updates including security fixes from the FreePBX repos.

#License
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
