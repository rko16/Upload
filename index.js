const express = require("express");
const multer = require("multer");
const fs = require("fs");

const app = express();
app.use(express.static("public"));

const upload = multer({ dest: "uploads/" });

app.post("/upload", upload.single("file"), (req, res) => {
  try {
    const { path: filePath, originalname: fileName } = req.file;
    const fileContent = fs.readFileSync(filePath, "utf-8");

    const { questions, options, answers, explanations } =
      extractData(fileContent);

    const responseObject = {
      fileName,
      questions,
      options,
      answers,
      explanations,
    };

    fs.unlinkSync(filePath);

    // Send the JSON data directly in the response
    res.status(200).json(responseObject);
  } catch (err) {
    console.error("Failed to process text file:", err);
    res.status(500).json({ error: "Failed to process text file" });
  }
});

function extractData(fileContent) {
  const questionRegex =
    /(\d+\.)\s+(.*?)\s*(?:\n|$)((?:\(?[a-d]\)?[>\)]?\s.*?\n?)+)(?:\n|$)/gi;

  const matches = [...fileContent.matchAll(questionRegex)];

  const questions = [];
  const options = [];
  const answers = [];
  const explanations = [];

  for (const match of matches) {
    const [, questionNum, question, optionsBlock] = match;
    const optionsArray = optionsBlock
      .split("\n")
      .filter(Boolean)
      .map((opt) => opt.trim());

    questions.push({ questionNum, question });
    options.push({
      optionA: getOptionText(optionsArray[0]),
      optionB: getOptionText(optionsArray[1]),
      optionC: getOptionText(optionsArray[2]),
      optionD: getOptionText(optionsArray[3]),
    });
    answers.push(null); // Setting answers to null
    explanations.push(null); // Setting explanations to null
  }

  return { questions, options, answers, explanations };
}

function getOptionText(option) {
  return option.replace(/^\(?[a-d]\)?[>\)]?\s*/, "").trim();
}

const port = 3000;
app.listen(port, () => {
  console.log(`Server is listening on http://localhost:${port}`);
});
