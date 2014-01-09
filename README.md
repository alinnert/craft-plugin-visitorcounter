# Visitor counter (for Craft)

This is a plugin for the CMS [Craft](http://buildwithcraft.com). It's a very basic visitor counter. It provides a dashboard widget and variables to display the statistics anywhere.
Currently the widget is German only. I will look into translating it into English soon.

## How does it work?

### Counting visitors

It simply counts unique IP addresses per day.

### Storing the data

The data that is going to be stored is:

- access date
- a SHA256 hash containing the IP and the date

That's all for now.

## How do I use it?

### Widget

Just add the widget to the dashboard like you add any other widget too.

### Add the tracking variable

Add the following variable anywhere inside your template:

	{{ craft.visitorCounter.trackVisitor }}

### Using the variables

Add the following variable to output the counter statistics:

	{{ craft.visitorCounter.getVisitorData( <period> ) }}

The parameter `period` can be one of the following strings:

- `today`: outputs the number of todays visitors (will be used, if no parameter is passed)
- `yesterday`: outputs the number of yesterdays visitors
- `week`: outputs the number of all visitors within the last seven days
- `all`: outputs the number of all visitors anytime

### Changelog

#### 1.1 (2014-01-09)

- Changed plugin folder name from "src" to "visitorcounter"
- Added English translation

#### 1.0 (2014-01-08)

- Initial release with simple Dashboard Widget and template variables
