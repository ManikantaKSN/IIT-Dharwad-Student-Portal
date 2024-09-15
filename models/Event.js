const mongoose = require('mongoose');

// SChema for Events
const eventSchema = new mongoose.Schema({
    eventName: { type: String, required: true },
    eventDate: { type: Date, required: true },
    eventDescription: { type: String, required: true },
    eventType: {type: String, default: "Miscellaneous"},
    eventVenue: {type: String, required: true}
});

module.exports = mongoose.model('Event', eventSchema);