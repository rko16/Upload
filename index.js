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

    const { questions, options } = extractData(fileContent);

    const responseObject = {
      fileName,
      questions,
      options,
    };

    fs.unlinkSync(filePath);

    res.setHeader(
      "Content-disposition",
      `attachment; filename=${fileName}.json`
    );
    res.setHeader("Content-type", "application/json");
    res.status(200).json(responseObject);
  } catch (err) {
    console.error("Failed to process text file:", err);
    res.status(500).json({ error: "Failed to process text file" });
  }
});

function extractData(fileContent) {
  // Regular expression to match questions and options with different formats
  const questionRegex =
    /(\d+\.)\s+(.*?)\s*(?:\n|$)((?:\(?[a-d]\)?[>\)]?\s.*?\n?)+)(?:\n|$)/gi;

  const matches = [...fileContent.matchAll(questionRegex)];

  const questions = [];
  const options = [];

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
  }

  return { questions, options };
}

function getOptionText(option) {
  return option.replace(/^\(?[a-d]\)?[>\)]?\s*/, "").trim();
}

const port = 3000;
app.listen(port, () => {
  console.log(`Server is listening on http://localhost:${port}`);
});
