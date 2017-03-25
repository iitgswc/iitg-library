# iitg-library
Web Portal for Lakshminath Bezbaroa Central Library

 **Users**

| User          | Details                                                                         |
| ------------- | ------------------------------------------------------------------------------- |
| Library Staff | The Librarian and staff enrolled under the Lakshminath Bezbaroa Central Library |
| Students      | Students enrolled in IIT Guwahati                                               |



----------

----------


## DEPLOYMENT

The application was developed and tested on the following server config:

- PHP >= 5.6 (preferably PHP7)
- MySQL >= 5 (Or any other database server compatible with CodeIgniter)
- Apache2

The application is developed using CodeIgnitor 3. Following are the required manual configurations:

1. Editing the application/config/config.php file :
  → Line 26 : Specify the base address from where the web-app will be served.
2. Editing the application/config/database.php file :
  → Line 76 onwards : Specify the database driver to be used, server address, database name, username and password.
3. Editing the .htaccess file in the root folder of the application :
  → Line 9 : Specify the relative address of the directory holding the application. This is used for removing the “index.php” from the url while accessing the application.


----------

----------


## USER MANUAL

The portal serves as an interface to the CMS like functionality required for managing dynamic content on the Library website pages.

## Login

The administrators from the Library staff can log into the back-end admin portal using a pre-designated username and password.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490368988382_file.png)


More users can be added/modified by the administrator via the portal.
Details required for an account are:

- Username/Email
- First Name
- Last Name
- Password
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490365860649_file.png)



## Admin Portal Dashboard

The dashboard provides quick access to all functionality of the admin-portal.
The links from the dashboard point to:

- Manage Latest Items
- Manage News and Ads
- Staff
  - Manage Staff Groups
  - Manage Staff Members
- Library Advisory Committee
  - Manage LAC Groups
  - Manage LAC Members
- Forms
  - Manage Form Groups
  - Manage Forms
- Manage Files
- Mange Journals
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369292029_file.png)



## 1. Manage Latest Items
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369398015_file.png)


The administrator can add items to the “Latest” section of the homepage of the library.
The fields to be filled include:

  - Order - decides the order in which the items will scroll through.
  - Text - the text to be displayed in the latest section
  - Url - Link which the item will redirect to. Can be a pdf file uploaded via “Files” page.
  - Display as New - If selected, shows a “NEW” icon next to the scrolling item.


![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369584158_file.png)


The added record is displayed as a scrolling item on the homepage.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369685766_file.png)



## 2. Manage News Items
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369882055_file.png)


The administrator can add items to the “News and Ads” section of the homepage of the library.
The fields to be filled include:

  - Order - decides the order in which the items will scroll through.
  - Text - the text to be displayed in the news section
  - URL - Link which the item will redirect to. Can be a PDF file uploaded via “Files” page.
  - Display as New - If selected, shows a “NEW” icon next to the item.


![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369893447_file.png)


The added record is displayed as a stationary item on the homepage.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490369933212_file.png)



## 3.1. Manage Staff Groups

Staff Groups are displayed on the http://intranet.iitg.ernet.in/lib/staff page and serve the purpose of grouping staff under designations. The “Manage Staff Groups” page allows adding/removing/editing and deleting these groups for dynamic control over the displayed content.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490373601645_file.png)


The administrator can add add or remove these groups by providing the following details:

  - Staff Group Name.
  - Staff Group Order - used for deciding the order of display.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490373761363_file.png)



## 3.2. Manage Staff Members

A Staff Member will belong to a Staff Member Group in a many-to-one relationship. The administrator can add a Staff member by associating him/her to a previously created Staff Group.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490373919955_file.png)


Details required for adding a staff member are:

  - Staff Group
  - Order - used for determining order of display.
  - Name
  - Designation
  - Email
  - Phone
  - Image - file upload.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374319684_file.png)


Newly added Staff Groups and Staff Members are dynamically displayed on the Staff page.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374364316_file.png)



## 4.1. Manage LAC Groups

The Library Advisory Committee is displayed on the http://intranet.iitg.ernet.in/lib/lac.php page and the functionality offered is exactly he same as Staff Groups and Staff Members.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374576229_file.png)


The administrator can add add or remove these groups by providing the following details:

  - LAC Group Name.
  - LAC Group Order - used for deciding the order of display.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374606170_file.png)

## 4.2. Manage LAC Members

Similar to Staff Members, a LAC Member belongs to an LAC Group in a many-to-one relationship. The administrator can add a LAC members by associating him/her to a previously created LAC Group.
A key difference is the “Archive Period” attribute for the LAC. Current serving members are marked “current” while past members are marked with the years of their active service on the LAC board.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374706696_file.png)


Details required for adding a LAC member are:

  - LAC Group
  - Order - used for determining order of display.
  - Name
  - Department
  - URL
  - Archive Period - “current” for current members. Year period for past members.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374780012_file.png)


Currently serving LAC Groups and LAC Members are dynamically displayed on the LAC page.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374814850_file.png)


Previous LAC Members can be viewed through the archive page which shows the year ranges available.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490374955995_file.png)

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375109187_file.png)



## 5.1. Manage Form Groups

Form groups are used for grouping together forms serving similar purposes. The forms are displayed on the http://intranet.iitg.ernet.in/lib/forms_new page.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375274233_file.png)


The administrator can add or remove these groups by providing the following details:

  - Form Group Name.
  - Form Group Order - used for deciding the order of display.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375294427_file.png)

## 5.2. Manage Forms

A Form belongs to a Form Group in a many-to-one relationship. The administrator can add a Form by associating it to a previously created Form Group..

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375385799_file.png)


A form can be added by providing the following details:

  - Form Group
  - Order - used for deciding the order of display.
  - Form Name
  - PDF Link - Link of previously uploaded file.
  - Doc Link - Link of previously uploaded file.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375401397_file.png)


Added forms are displayed as below:

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375503753_file.png)



## 6. Manage Files

Files are uploaded to serve as forms, images, notices and advertisements. The “Manage Files” page allows the administrator to upload files and provides a url that can then be used on other parts of the portal.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375683532_file.png)


A new file can be uploaded by providing the following details:

- File to be Uploaded
- Description
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490375737905_file.png)


Files uploaded via the “Manage Files” page are not directly displayed to the user unless the administrator provides a link to them through some other interface.


## 7. Journal Search

A separate database has been created for keeping track of the journals bought by the Library. Users can search the Journals using their Name, ISSN number or Publisher. An auto-complete features has been implemented that shows partially matching results as suggestions while searching.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490376198785_file.png)


Users can check the details of the Journals and click on “Check” to view their availability.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490376274181_file.png)


Administrator can manage the Journals currently present in the database. New Journals can be added/edited/removed via the back-end admin portal.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490376342267_file.png)


A new Journal can be added by proving the following details:

  - Journal Title
  - URL to the Journal website.
  - Publisher
  - Publisher’s URL
  - Format of the Journal
  - ISSN Number
  - Availability - custom multi-line input.
![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490376393980_file.png)


Journals can also be added via the “Bulk Upload” option.
The Bulk-Upload option expects a CSV file without header line containing 7 comma separated entries on each line corresponding to the 7 attributes of the Journal.
Since ISSN and Availability can have multiple lines, the entries can be separated by pipe character “|” and the server will replace these with new-lines before adding them to the database.
Results of the bulk-upload are shown with details of each entry per line.

![](https://d2mxuefqeaa7sj.cloudfront.net/s_E3723F5C383558EFAD720658D4E68629055A1CAF00576D6380804F8D4F0E4A21_1490376601910_file.png)



----------
