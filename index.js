const express = require('express');
const multer = require('multer');
const fs = require('fs');

const app = express();
app.use(express.static('public'));

const upload = multer({ dest: 'uploads/' });

app.post('/upload', upload.single('file'), (req, res) => {
  try {
    const { path: filePath, originalname: fileName } = req.file;

    const fileContent = fs.readFileSync(filePath, 'utf-8');

    const { questions, options, answers, explanations } = extractData(fileContent);

    const responseObject = {
      fileName,
      questions,
      options,
      answers,
      explanations
    };

    fs.unlinkSync(filePath);

    // Send the JSON data as a downloadable file
    res.setHeader('Content-disposition', `attachment; filename=${fileName}.json`);
    res.setHeader('Content-type', 'application/json');
    res.status(200).json(responseObject);
  } catch (err) {
    console.error('Failed to process text file:', err);
    res.status(500).json({ error: 'Failed to process text file' });
  }
});

function extractData(fileContent) {
    const questionRegex = /Q(\d+)\.\s+(.*?)\s+a\>(.*?)\s+b\>(.*?)\s+c\>(.*?)\s+d\>(.*?)\s+Answer:\s+\((\w)\)\s+(.*)\s+Explanation:\s+(.*)/gi;
    // const questionRegex = /(\d+)\.\s+(.*?)\s+\(a\)(.*?)\s+\(b\)(.*?)\s+\(c\)(.*?)\s+\(d\)(.*?)/gi;

  const matches = [...fileContent.matchAll(questionRegex)];

  const questions = [];
  const options = [];
  const answers = [];
  const explanations = [];

  for (const match of matches) {
    const [, questionNum, question, optionA, optionB, optionC, optionD, answerCode, answer, explanation] = match;
    questions.push({ questionNum, question });
    options.push({ optionA, optionB, optionC, optionD });
    answers.push({ answerCode, answer });
    explanations.push({ explanation });
  }

  return { questions, options, answers, explanations };
}

const port = 3000;
app.listen(port, () => {
  console.log(`Server is listening on http://localhost:${port}`);
});