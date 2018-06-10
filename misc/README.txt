GENERAL FORMATTING RULE:
	- Do not copy and paste from the other sites. Will result in displaying special random characters
	- Do not include font-style such as bolded or italicized words.
	- REQUIRED FIELDS: Organization, Category, Website
	- If any of the other fields are left blank, it will have a message in the website that the information is unavailable.

[organization.txt] - Contains the information for each organziation in healthy campus webiste
	$Format
		- "Organization": Only valid letters
		- "Website": Full URL link (including "http://")
		- "Category": Can only be one of five choices
			- PHYSICAL
			- MENTAL
			- NUTRITION
			- ALCOHOL
			- SEXUAL
			*Not case sensitive
		- "Description": No limitations; What's written will be shown the exact same way in the website. If want to start another paragraph need to enter "|par|"
		- "Users": Can only be one of three choices
			- STUDENT
			- FACULTY
			- BOTH
			*Not case sensitive
		- "Hours of Operation": 
			- Days are represented as follows
				- m = Monday
				- tu = Tuesday
				- w =  Wednesday
				- th = Thursday
				- f = Friday
				- sa = Saturday
				- su = Sunday
			- Hours are represented by two digits (ie 01, 12, etc.,)
			- Minutes are represented by two digits (ie 07, 22, etc.,)
			- Time is separated by ":"
			- Morning is represented by am, Afternoon is represented by pm
			- Format: Day(s)=Opening-Closing, 
			*Case sensitive, multiple entry is split by a comma
			*Days that are not found in this column will be classified as "closed"
			*Repeating days are invalid
			*Example: mtuwthf=8:00am-5:00pm,s=12:00PM-3PM
			*The example above reads -> from Monday thru Friday, it's open from 8am to 5pm, Saturday is open from noon to 3pm, Sunday is "closed"
			*Special Keywords: Time range can be replaced by allday to signify that its open for the whole day -> example: mwf=allday
		- "Image Link": the name of the image file (including extention such as jpeg, png, etc.,). Case Sensitive
		- "Phone Number": Only 10 numbers; No other characters;Needs to be surrounded by ""
			*Example: "1234567890"
		- "Email": Needs to follow the basic email format with the "@" symbol -> example: email@example.com
		- "Location": No limitations; What's written will be shown the exact same way in the website

[subcategory.txt]
	$Format
		- "Category": Can only be one of five choices
			- PHYSICAL
			- MENTAL
			- NUTRITION
			- ALCOHOL
			- SEXUAL
			*Not case sensitive
		- "Description": No limitations; What's written will be shown the exact same way in the website. If want to start another paragraph need to enter "|par|"
		- "Hotlines": 
			- Phone numbers are represented by only numbers and needs to be 10 digits
			- Name of the organization has no limitation, what's written will be shown the exact same way in the website
			- Each will be separated by ","
			- Format: Name=10 numbers,
			*Example: National Suicide Prevention Lifeline=8002738255,The National Domestic Violence=8007997233
			