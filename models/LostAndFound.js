const mongoose = require('mongoose');

// Define the LostItem schema
const lostItemSchema = new mongoose.Schema({
    name: String,
    roll_number: String,
    location: String,
    item_name: String,
    contact_number: String,
    file: String
}); 
// Create the LostItem model
const LostItem = mongoose.model('LostItem', lostItemSchema);

// Schema for found items
const foundItemSchema = new mongoose.Schema({
    name: String,
    roll_no: String,
    location: String,
    item_name: String,
    contact_no: String,
    file: String
});
// Create the FoundItem model
const FoundItem = mongoose.model('FoundItem', foundItemSchema);

module.exports = {LostItem, FoundItem};