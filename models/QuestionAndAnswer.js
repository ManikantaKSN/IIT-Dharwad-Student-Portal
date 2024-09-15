const mongoose = require('mongoose');

// Define schemas and models
const QuestionSchema = new mongoose.Schema({
    quest: String,
    username: String
});
const Question = mongoose.model('Question', QuestionSchema);

const AnswerSchema = new mongoose.Schema({
    question_id: mongoose.Schema.Types.ObjectId,
    answer_text: String,
    username: String
});
const Answer = mongoose.model('Answer', AnswerSchema);

module.exports = {Question, Answer};