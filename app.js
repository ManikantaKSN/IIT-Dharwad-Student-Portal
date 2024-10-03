require('dotenv').config();
const express = require('express');
const path = require('path');
const bodyParser = require('body-parser');
const app = express();
const PORT = process.env.PORT || 3000;
const mongoose = require('mongoose');
const multer = require('multer'); 
const Event = require('./models/Event');
const {LostItem, FoundItem} = require('./models/LostAndFound');
const {Question, Answer} = require('./models/QuestionAndAnswer');
const upload = require('./models/Multer');

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.urlencoded({ extended: false }));

mongoose.connect('mongodb://localhost:27017/studentportal')
    .then(() => console.log('Connected to MongoDB'))
    .catch(err => console.error('Could not connect to MongoDB:', err));

//[Home] Route for home page
app.get('/', (req, res) => {
    res.render('home');
});
app.get('/home', (req, res) => {
    res.render('home');
});

//[Admin] Route for admin page
app.get('/admin', (req, res) => {
    res.render('admin');
});

//[Quick Links] Route for quick links
app.get('/quicklinks', (req, res) => {
  res.render('quicklinks');
});

//[Events] Route to display events
app.get('/events', async (req, res) => {
  try {
      const events = await Event.find().exec(); // Fetch all events from MongoDB
      res.render('events', { events: events });
  } catch (err) {
      console.error('Error retrieving events:', err);
      res.status(500).send('Error retrieving events');
  }
});

//[Events] Route to render the 'addevents' form
app.get('/addevents', (req, res) => {
  res.render('addevents');
});

//[Events] Route to handle event addition
app.post('/addevents', (req, res) => {
  const {eventName, eventDate, eventDescription, eventType = "Miscellaneous"} = req.body;
  const newEvent = new Event({eventName, eventDate, eventDescription, eventType});
  newEvent.save()
    .then(() => {
      res.redirect('/admin');
    })
    .catch(err => {
      console.error(err);
      res.send('Error saving event to database.');
    });
});

//[Events] Route to render the delete events page
app.get('/deleteEvents', async (req, res) => {
  try {
    const events = await Event.find(); // Fetch all events from the database
    res.render('deleteEvents', {events});
  } catch (err) {
    res.status(500).send('Error retrieving events');
  }
});

//[Events] Route to handle event deletion
app.post('/deleteEvent', async (req, res) => {
  try {
    const eventId = req.body.eventId;
    await Event.findByIdAndDelete(eventId); // Delete the event by ID
    res.redirect('/deleteEvents'); // Redirect back to the delete events page
  } catch (err) {
    res.status(500).send('Error deleting event');
  }
});

//[LostAndFound] Route to render the lost and found page
app.get('/lostandfound', (req, res) => {
  res.render('lostandfound');
});

//[LostAndFound] Route to render the lost form page
app.get('/lostform', (req, res) => {
  res.render('lostform');
});

//[LostAndFound] Route to render the lost items page
app.get('/lostitems', (req, res) => {
  LostItem.find()
    .then(lostItems => {
      res.render('lostitems', { lostItems: lostItems });
    })
    .catch(err => {
      console.error('Error fetching lost items:', err);
      res.status(500).send('Internal Server Error');
    });
});

//[LostAndFound] Route to handle form submission
app.post('/lostform', upload.single('file'), (req, res) => {
  const { name, roll_no, location, item_name, contact_no } = req.body;
  const file = req.file ? `/uploads/${req.file.filename}` : '';

  // Create a new LostItem document
  const lostItem = new LostItem({
    name: name,
    roll_number: roll_no,
    location: location,
    item_name: item_name,
    contact_number: contact_no,
    file: file
  });

  // Save the document to the database
  lostItem.save()
    .then(() => {
      console.log('Lost item data saved successfully!');
      res.redirect('/lostandfound'); // Redirect to lost and found page
    })
    .catch(err => {
      console.error('Error saving lost item data:', err);
      res.status(500).send('Internal Server Error');
    });
});

//[LostAndFound] Route to render found form
app.get('/foundform', (req, res) => {
  res.render('foundform');
});

//[LostAndFound] Route to display found items
app.get('/founditems', async (req, res) => {
  try {
      const foundItems = await FoundItem.find(); // Fetch all found items from MongoDB
      res.render('founditems', { items: foundItems });
  } catch (err) {
      console.error('Error retrieving items:', err);
      res.status(500).send('Error retrieving items');
  }
});

//[LostAndFound] Route to upload found items
app.post('/foundform', upload.single('file'), (req, res) => {
  const { name, roll_no, location, item_name, contact_no } = req.body;
  const file = req.file ? `/uploads/${req.file.filename}` : '';
  const newItem = new FoundItem({name, roll_no, location, item_name, contact_no, file});
  newItem.save()
    .then(() => {
        res.redirect('/lostandfound');
    })
    .catch(err => {
        console.error('Error saving to database:', err);
        res.status(500).send('Error saving to database');
    });
});

//[Forum] Route for community forum
app.get('/forums', (req, res) => {
  res.render('forums');
});

//[Forum] Route to display conversations
app.get('/view_conversations', async (req, res) => {
    try {
        const questions = await Question.find().exec();
        const answers = await Answer.find().exec();
        res.render('view_conversations', { questions: questions, answers: answers });
    } catch (err) {
        console.error('Error retrieving conversations:', err);
        res.status(500).send('Error retrieving conversations');
    }
});

//[Forum] Route to render the ask question page
app.get('/ask_question', (req, res) => {
    res.render('ask_question');
});

//[Forum] Route to handle form submission
app.post('/ask_question', async (req, res) => {
    const { question, username } = req.body;
    const newQuestion = new Question({
        quest: question,
        username: username
    });

    try {
        await newQuestion.save();
        res.render('ask_question', { message: 'Question submitted successfully! Redirecting...', redirect: '/forums' });
    } catch (err) {
        console.error('Error saving question:', err);
        res.status(500).send('Internal Server Error');
    }
});

//[Forum] Route to render the answer questions page
app.get('/answer_questions', async (req, res) => {
    try {
        const questions = await Question.find();
        res.render('answer_questions', { questions });
    } catch (err) {
        console.error('Error fetching questions:', err);
        res.status(500).send('Internal Server Error');
    }
});

//[Forum] Route to handle answer submission
app.post('/answer_questions', async (req, res) => {
    const { selected_question, answer, username } = req.body;
    const answerDocument = new Answer({
        question_id: selected_question,
        answer_text: answer,
        username: username
    });
    try {
        await answerDocument.save();
        res.redirect('/forums'); // Adjust the redirect as necessary
    } catch (err) {
        console.error('Error saving answer:', err);
        res.status(500).send('Internal Server Error');
    }
});

// Start server
app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});