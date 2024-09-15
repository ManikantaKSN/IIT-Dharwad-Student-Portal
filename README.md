# IITDH Student Portal

The IITDH Student Portal is a web application for IIT Dharwad students, providing essential links, a comprehensive listing of upcoming events, a lost and found section, and a discussion forum. Developed with **Node.js**, **Express**, and **MongoDB**, it enhances the management and accessibility of these resources.

## Features

### 1. Quick Links
   - A curated collection of useful links for students, such as academic resources, department pages, hostel information, and more.
   - Accessible to all users, ensuring quick navigation to essential services.

### 2. Events
   - Displays a list of upcoming events happening on campus.
   - Students can view event details such as the date, time, location, and description.

### 3. Lost and Found Section
   - Allows students to report lost and found items by uploading a description and an image of the item.
   - Users can view reported items and contact the relevant person to retrieve their lost items.

### 4. Discussion Forum
   - A place for students to ask questions, discuss topics, and provide answers to others.
   - Engages the community by encouraging interaction and knowledge sharing among students.

### 5. Admin Panel
   - An admin role with special privileges to manage the portal’s content.
   - **Admin Capabilities:**
     - Add and delete events.
     - Add and delete quick links.
   - Helps keep the portal updated with the latest information.

## Tech Stack

- **Backend:** Node.js, Express
- **Database:** MongoDB
- **Frontend:** EJS, CSS
- **Image Uploads:** Handled through 'multer' for Lost and Found section.

## Setup Instructions

1. **Clone the Repository:**
   git clone https://github.com/your-repo/iitdh-student-portal.git
   cd iitdh-student-portal
2. **Install Dependencies**
    npm install
3. **Run the application**
    npm start
*The application will be accessible at http://localhost:3000.*

## Usage
1. Visit the homepage to access quick links, view upcoming events, and explore the discussion forum.
2. To report lost and found items, navigate to the "Lost and Found" section.
3. Go to the discussion forum to get any doubt cleared by asking questions and receiving answers.
4. For admin functionalities, log in with admin credentials to add or remove events and quick links.

## Future Enhancements
Implementing notifications for new events or forum posts.
Adding user authentication for the discussion forum and 'Lost and Found' section.
