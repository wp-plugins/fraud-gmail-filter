=== Fraud Gmail Filter ===
Contributors: saaiful
Donate link: 
Tags: Fraud Gmail Filter, Clone Gmail Filter, Doteted Gmail Filter
Requires at least: 4.0
Tested up to: 4.1
Stable tag: 4.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Fraud Gmail / Clone Gmail / Doteted Gmail Filter For Registration.

== Description ==

Gmail doesn't recognize dots as characters within usernames (email). So when one register with a email like `saiful@gmail.com` He can register in your wordpress site using same email just by using some of Gmail's Trick.

*	Append a plus `("+")` sign and any combination of words or numbers after your email address. For example, if your name was `saiful@gmail.com`, you could send mail to `saiful+islam@gmail.com` or `saiful+lol@gmail.com`.
*	Insert one or several dots `("+")` anywhere in your email address. Gmail doesn't recognize periods as characters in addresses they just ignore them. For example, you could tell people your address was `saiful@gmail.com`, `saiful.islam@gmail.com` or `s.a.i.f.u.l@gmail.com`.

I decided to solve this issue , so i wrote a plugin which prevent bad guys from using same mail for registration.  I wish you guys enjoy this plugin.


== Installation ==

1. Upload `fraud_gmail.php` to the `/wp-content/plugins/fraud-gmail-filter` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The settings page

== Changelog ==
= 0.0.3 =
* compatibility update

= 0.0.3 =
* Option page added
* Domain Block List added

= 0.0.2 =
* New Method Added for `googlemail`.
* Case filter added

= 0.0.1 =
* First release.