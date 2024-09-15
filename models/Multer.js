const multer = require('multer'); 

// Configure Multer for file uploads
const storage = multer.diskStorage({
    destination: (req, file, cb) => {
      cb(null, 'public/uploads/'); // Save uploaded files in 'public/uploads' folder
    },
    filename: (req, file, cb) => {
      cb(null, Date.now() + '-' + file.originalname); // Ensure unique file names
    }
  });

const upload = multer({ storage: storage });

module.exports = upload;