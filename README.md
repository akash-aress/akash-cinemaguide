# Cinema Guide Application

    ## Introduction
    This documentation describes the important notes that the developer has experienced while implementing the application.


    ## System Architecture

        ### Application Data Model

        The diagram at below path represents the data model that has been considered for the application

        ~\resources\images\diagram.png
        

        ### Application Workflows overview
            1.	The application allows users to login into the system. Once the user is logged in he can see the cinema listing.
            2.	Users can see cinemas, add, edit and delete them.
            3.	Users can also see movies, add, edit and delete them.
            4.	Users can also add movies sessions to the cinema and update and delete them
            5.	Users can see movies assigned to particular cinemas in the list view.
            6.	Users can edit, delete session times from the listing.
            7.  Please read the shared "CinemaGuideApplication-Documetation-Akash-20Aug2021.docx" for Application and API test access details.

    ## Troubleshooting
    Below are some issues that I have experienced during the application development and details about the solution that I have implemented in order to address the issue
        1.	Faced issues while assigning model relations and fetching cinema movie data. Added raw Laravel DB query to fetched cinema movie data.

    ## API Documentation 
    The API documentation can be found at the link mentioned below – https://documenter.getpostman.com/view/8029345/TzzDHZjD
