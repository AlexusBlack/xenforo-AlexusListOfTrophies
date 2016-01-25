Thank you for downloading List of trophies by Alex Chernov.

INSTALLATION:

To install this add-on, you will need to extract the zip and upload all the
files from the contained upload directory onto your web server into the root
folder of your XenForo Directory.

Having uploaded the necessary files, you should log in to the Admin Control
Panel of your XenForo Installation and click on 'Install Add-on' under the
heading 'Add-ons' on the left-hand side of the Admin Control Panel under the
'Home' tab.

Upload file called 'addon-AlexusListOfTrophies.xml'.

HOW TO USE:

This add-on provides a helper called ‘trophieslist’ with options:
- userid [required]
- points (filter trophies by points, single value ’N’ or interval ’N-N’) [optional]
- limit (limit amount to output) [optional]
- ids (filter by ids, single value or multiple comma separated values) [optional]
- icons path (path to icons folder) [optional]
- link format (if specified will wrap output with link, %trophy_id% will be replaced with the ID of current trophy) [optional]
- format (output format, default is %icon%. Supports these variables: %icon%, %points%, %title%, %description%.) [optional]

Example: 
{xen:helper trophieslist, $user.user_id, 0, 4, '', '/forum/styles/default/xenforo/trophies/', '/forum/help/trophies#trophy-%trophy_id%’}

For icons used the same idea as in this resource - https://xenforo.com/community/resources/customize-individual-trophy-icons.946/ .