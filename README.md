# studying-abroad - [Link](https://gyskard.alwaysdata.net/)

Tutored project of the second year of the university diploma of technology, in network and telecommunications, at [IUT 1](https://iut1.univ-grenoble-alpes.fr/) of the University of Grenobles-Alpes (France). The purpose of this project is to create a website to collect testimonies from students of the IUT who went to study abroad or from foreign students who came to the IUT. 

## Description

The website is divided into two parts.

### The public website

The public website is composed of an interactive map where each testimony is represented by a marker, when you click on it the student's testimony is displayed in a popup. 

![](https://image.noelshack.com/fichiers/2019/06/6/1549711960-img.png)

There are different information pages accessible through the menu at the top. 

![](https://image.noelshack.com/fichiers/2019/06/6/1549712110-screenshot-2019-02-09-de-l-uga-a-l-international.png)

A Google Forms is available to propose a new testimonial.

!(https://image.noelshack.com/fichiers/2019/06/6/1549712208-screenshot-2019-02-09-proposer-un-temoignage.png)

### The testimonial manager

As its name suggests, it allows you to manage the different testimonies added to the website, it interacts with JSON files to store the testimonies and with a MySQL database for authentication.   

#### Login page

![](https://image.noelshack.com/fichiers/2019/06/6/1549712765-screenshot-2019-02-09-etudes-a-l-etranger-login.png)

#### Index page

The index page provides different statistics.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712953-screenshot-2019-02-09-gestionnaire-de-temoignages.png)

#### Testimonies page

The testimonials page allows you to manage testimonials, there is a complete list of testimonials with information, and there are several action buttons. 

![](https://image.noelshack.com/fichiers/2019/06/6/1549712943-screenshot-2019-02-09-gestionnaire-de-temoignages-1.png)

###### Edit

The edit button redirects to a page to edit the testimonial information.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712944-screenshot-2019-02-09-gestionnaire-de-temoignages-2.png)

###### Delete

The delete button redirects to a page to delete the testimonial.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712945-screenshot-2019-02-09-gestionnaire-de-temoignages-3.png)

#### Logs page

The logs page allows to access the logs of all the users' actions on the website (interaction with testimonials, loading a page... etc).

#### Settings page

This page allows you to change different settings and manage the manager's users. The template of the page looks like the one of the testimonial management page, on the left a list of users with information, on the right of the action buttons.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712954-screenshot-2019-02-09-gestionnaire-de-temoignages-4.png)

###### Edit

The edit button redirects to a page to edit the user information.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712953-screenshot-2019-02-09-gestionnaire-de-temoignages-5.png)

###### Delete

The delete button redirects to a page to delete the user.

![](https://image.noelshack.com/fichiers/2019/06/6/1549713511-img.png)

#### Credits page

Single page with the list of people who participated in the project.

![](https://image.noelshack.com/fichiers/2019/06/6/1549712953-screenshot-2019-02-09-gestionnaire-de-temoignages-6.png)

## Built With

* [jQuery](https://jquery.com/) - JavaScript library
* [Bootstrap](https://letsencrypt.org/) - Toolkit for developing with HTML, CSS, and JS
* [Font asewome](https://fontawesome.com/) - Font and icon toolkit based on CSS and LESS

## Authors

* **Thomas Margueritat** - *Initial work* - [Gyskard](https://github.com/Gyskard)
* **Guillaume Barnéoud** - *Initial work* - [0Guillaume](https://github.com/0Guillaume)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
