const question = document.getElementById('question');
const choices = Array.from(document.getElementsByClassName('choice-text'));
const progressText = document.getElementById('progressText');
const scoreText = document.getElementById('score');
const progressBarFull = document.getElementById('progressBarFull');
const loader = document.getElementById('loader');
const game = document.getElementById('game');

let currentQuestion = {};
let acceptingAnswers = false;
let score = 0;
let questionCounter = 0;
let availableQuestions = [];
let questions = [];

// CONSTANTS
const CORRECT_BONUS = 10;
const MAX_QUESTIONS = 20;

function normalizeQuestion(loadedQuestion) {
  // Your questions.json already uses this format:
  // question, choice1, choice2, choice3, choice4, answer
  if (
    loadedQuestion.choice1 &&
    loadedQuestion.choice2 &&
    loadedQuestion.choice3 &&
    loadedQuestion.choice4 &&
    loadedQuestion.answer
  ) {
    return loadedQuestion;
  }

  // This also supports Open Trivia DB format, in case you switch back to the API later.
  if (loadedQuestion.incorrect_answers && loadedQuestion.correct_answer) {
    const formattedQuestion = {
      question: loadedQuestion.question,
    };

    const answerChoices = [...loadedQuestion.incorrect_answers];
    formattedQuestion.answer = Math.floor(Math.random() * 4) + 1;

    answerChoices.splice(
      formattedQuestion.answer - 1,
      0,
      loadedQuestion.correct_answer
    );

    answerChoices.forEach((choice, index) => {
      formattedQuestion['choice' + (index + 1)] = choice;
    });

    return formattedQuestion;
  }

  throw new Error('Question format is not valid. Check questions.json.');
}

fetch('./questions.json?v=cloud-web-questions-2026')
  .then((res) => {
    if (!res.ok) {
      throw new Error(`Could not load questions.json. Status: ${res.status}`);
    }
    return res.json();
  })
  .then((loadedQuestions) => {
    const questionList = loadedQuestions.results || loadedQuestions;
    questions = questionList.map(normalizeQuestion);
    startGame();
  })
  .catch((err) => {
    console.error(err);
    loader.classList.add('hidden');
    game.classList.remove('hidden');
    question.innerText =
      'Could not load the quiz questions. Run this project through a local server like MAMP or VS Code Live Server, not by double-clicking index.html.';
  });

function startGame() {
  questionCounter = 0;
  score = 0;
  availableQuestions = [...questions];
  getNewQuestion();
  game.classList.remove('hidden');
  loader.classList.add('hidden');
}

function getNewQuestion() {
  if (availableQuestions.length === 0 || questionCounter >= MAX_QUESTIONS) {
    localStorage.setItem('mostRecentScore', score);
    return window.location.assign('./end.html');
  }

  questionCounter++;
  progressText.innerText = `Question ${questionCounter}/${MAX_QUESTIONS}`;
  progressBarFull.style.width = `${(questionCounter / MAX_QUESTIONS) * 100}%`;

  const questionIndex = Math.floor(Math.random() * availableQuestions.length);
  currentQuestion = availableQuestions[questionIndex];
  question.innerText = currentQuestion.question;

  choices.forEach((choice) => {
    const number = choice.dataset.number;
    choice.innerText = currentQuestion['choice' + number];
  });

  availableQuestions.splice(questionIndex, 1);
  acceptingAnswers = true;
}

choices.forEach((choice) => {
  choice.addEventListener('click', (e) => {
    if (!acceptingAnswers) return;

    acceptingAnswers = false;
    const selectedChoice = e.target;
    const selectedAnswer = selectedChoice.dataset.number;

    const classToApply =
      Number(selectedAnswer) === Number(currentQuestion.answer)
        ? 'correct'
        : 'incorrect';

    if (classToApply === 'correct') {
      incrementScore(CORRECT_BONUS);
    }

    selectedChoice.parentElement.classList.add(classToApply);

    setTimeout(() => {
      selectedChoice.parentElement.classList.remove(classToApply);
      getNewQuestion();
    }, 1000);
  });
});

function incrementScore(num) {
  score += num;
  scoreText.innerText = score;
}
