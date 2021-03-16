let nodes = [
  ["", "", "", ""],
  ["", "", "", ""],
  ["", "", "", ""],
  ["", "", "", ""]
];

let isGameOver = false;
let sound = false;

const generateIndex = () => {
  let emptyNode = false;

  nodes.forEach(parentNode => {
    parentNode.forEach(node => {
      if (!node) emptyNode = true;
    });
  });

  if (!emptyNode) {
    nodes.forEach((parentNode, parentIndex) => {
      parentNode.forEach((node, childIndex) => {
        if (parentIndex - 1 >= 0) {
          if (nodes[parentIndex - 1][childIndex] === node) emptyNode = true;
        }

        if (childIndex + 1 <= 3) {
          if (nodes[parentIndex][childIndex + 1] === node) emptyNode = true;
        }
      });
    });
  }

  if (!emptyNode) return false;

  let parentIndex = Math.floor(Math.random() * 4);
  let childIndex = Math.floor(Math.random() * 4);

  if (nodes[parentIndex][childIndex]) return generateIndex();
  let indexes = [parentIndex, childIndex];
  return indexes;
};

const generateRandomValue = val => {
  if (!val) val = 0;

  let value = Math.random() < 0.5 ? 2 : 4;

  if (val === value) return generateRandomValue(val);
  return value;
};

const renderNodes = () => {
  let i = 0;

  nodes.forEach(parentNode => {
    parentNode.forEach(node => {
      if (node)
        document.querySelectorAll(".board div")[
          i
        ].innerHTML = `<h3>${node}</h3>`;
      else document.querySelectorAll(".board div")[i].innerHTML = ``;

      i++;
    });
  });
};

const windowOnLoad = () => {
  isGameOver = true;

  document.querySelector("#welcome-game").style.top = "50%";

  if (!localStorage.getItem("bestScore")) localStorage.setItem("bestScore", 0);
  let bestScore = localStorage.getItem("bestScore");

  document.querySelector(".best-score").innerHTML = `<h3>${bestScore}</h3>`;

  for (let i = 0; i < 16; i++) {
    document.querySelector(".board").innerHTML += "<div></div>";
  }

  let value = 0;
  for (let i = 0; i < 2; i++) {
    let indexes = generateIndex();
    value = generateRandomValue(value);

    nodes[indexes[0]][indexes[1]] = value;
  }

  renderNodes();
};

windowOnLoad();

const checkEdgeNode = (parentIndex, childIndex, indexDir, num, dir) => {
  if (indexDir < 0 || indexDir > 3) return true;

  let nextDir =
    dir === "top" || dir === "down"
      ? nodes[indexDir][childIndex]
      : nodes[parentIndex][indexDir];
  if (nextDir)
    return checkEdgeNode(parentIndex, childIndex, indexDir + num, num, dir);

  return false;
};

const checkAddition = (
  parentIndex,
  childIndex,
  indexDir,
  node,
  num,
  dir,
  addedNode
) => {
  if (indexDir < 0 || indexDir > 3) return false;
  addedNode.forEach(nodeAdd => {
    let addedValue = nodes[nodeAdd.firstIndex][nodeAdd.secondIndex];

    if (dir === "top" || dir === "down") {
      if (childIndex === nodeAdd.secondIndex && node === addedValue)
        return false;
    } else if (dir === "left" || dir === "right") {
      if (parentIndex === nodeAdd.firstIndex && node == addedValue)
        return false;
    }
  });

  let nextDir =
    dir === "top" || dir === "down"
      ? nodes[indexDir][childIndex]
      : nodes[parentIndex][indexDir];

  if (nextDir && nextDir !== node) return false;
  else if (!nextDir)
    return checkAddition(
      parentIndex,
      childIndex,
      indexDir + num,
      node,
      num,
      dir,
      addedNode
    );
  else if (nextDir && nextDir === node) {
    let sum = node * 2;

    if (dir === "top" || dir === "down") nodes[indexDir][childIndex] = sum;
    else if (dir === "left" || dir === "right")
      nodes[parentIndex][indexDir] = sum;

    let currentScore = document.querySelector(".current-score").innerText;
    let afterScore = sum + parseInt(currentScore);
    document.querySelector(
      ".current-score"
    ).innerHTML = `<h3>${afterScore}</h3>`;

    if (afterScore > localStorage.getItem("bestScore"))
      localStorage.setItem("bestScore", afterScore);
    let bestScore = localStorage.getItem("bestScore");
    document.querySelector(".best-score").innerHTML = `<h3>${bestScore}</h3>`;

    nodes[parentIndex][childIndex] = "";

    let indexes =
      dir === "top" || dir === "down"
        ? [indexDir, childIndex]
        : [parentIndex, indexDir];
    return indexes;
  }
};

const checkIfWin = () => {
  nodes.forEach(parentNode => {
    parentNode.forEach(node => {
      if (node >= 512) return true;
    });
  });
};

const triggerWin = () => {
  isGameOver = true;

  document.querySelector("#game-win").style.top = "50%";
  document.querySelector(".overlay").style.visibility = "visible";
  document.querySelector(".overlay").style.opacity = "1";
};

const triggerGameOver = () => {
  isGameOver = true;

  document.querySelector("#game-over").style.top = "50%";
  document.querySelector(".overlay").style.visibility = "visible";
  document.querySelector(".overlay").style.opacity = "1";
};

const moveNode = (num, dir) => {
  let addedNode = [];
  let moveTasks = [];

  nodes.forEach((parentNode, parentIndex) => {
    parentNode.forEach((node, childIndex) => {
      if (!node) return;

      let addition = false;

      let indexDir =
        dir === "top" || dir === "down" ? parentIndex + num : childIndex + num;

      let edgeNode = checkEdgeNode(parentIndex, childIndex, indexDir, num, dir);
      addition = checkAddition(
        parentIndex,
        childIndex,
        indexDir,
        node,
        num,
        dir,
        addedNode
      );

      if (addition) {
        addedNode.push({
          firstIndex: addition[0],
          secondIndex: addition[1]
        });

        return;
      }
      if (edgeNode) return;

      if (dir === "top") nodes[indexDir][childIndex] = node;
      else if (dir === "left") nodes[parentIndex][indexDir] = node;
      else if (dir === "right" || dir === "down")
        moveTasks.push({
          parentIndex,
          childIndex,
          node,
          num,
          indexDir
        });

      nodes[parentIndex][childIndex] = "";
    });
  });

  moveTasks.forEach(task => {
    if (dir === "top" || dir === "down")
      nodes[task.indexDir][task.childIndex] = task.node;
    else if (dir === "left" || dir === "right")
      nodes[task.parentIndex][task.indexDir] = task.node;
  });

  let win = checkIfWin();
  if (win) triggerWin();

  let randomIndex = generateIndex();
  let randomValue = generateRandomValue();

  if (!randomIndex) {
    triggerGameOver();

    return;
  }

  nodes[randomIndex[0]][randomIndex[1]] = randomValue;

  renderNodes();
};

window.addEventListener("keyup", e => {
  if (!isGameOver) {
    if (e.keyCode === 87 || e.keyCode === 38) moveNode(-1, "top");
    else if (e.keyCode === 68 || e.keyCode === 39) moveNode(+1, "right");
    else if (e.keyCode === 83 || e.keyCode === 40) moveNode(+1, "down");
    else if (e.keyCode === 65 || e.keyCode === 37) moveNode(-1, "left");
  }
});

const newGameClick = () => {
  isGameOver = false;

  document.querySelector("#welcome-game").style.visibility = "hidden";
  document.querySelector("#welcome-game").style.opacity = "0";
  document.querySelector(".overlay").style.visibility = "hidden";
  document.querySelector(".overlay").style.opacity = "0";
};

const playAgain = () => {
  document.querySelector("#game-over").style.top = "-100%";
  document.querySelector(".overlay").style.visibility = "hidden";
  document.querySelector(".overlay").style.opacity = "0";
  document.querySelector(".current-score h3").innerHTML = "0";

  nodes = [
    ["", "", "", ""],
    ["", "", "", ""],
    ["", "", "", ""],
    ["", "", "", ""]
  ];

  isGameOver = false;

  document.querySelector(".board").innerHTML = "";

  for (let i = 0; i < 16; i++) {
    document.querySelector(".board").innerHTML += "<div></div>";
  }

  let value = 0;
  for (let i = 0; i < 2; i++) {
    let indexes = generateIndex();
    value = generateRandomValue(value);

    nodes[indexes[0]][indexes[1]] = value;
  }

  renderNodes();
};

const triggerSound = () => {
  let sound = document.querySelector("#sound");
  let soundButton = document.querySelector(".sound");

  if (!sound.paused) {
    sound.pause();
    soundButton.innerHTML = "Enable Sound";
  } else {
    sound.play();
    soundButton.innerHTML = "Disable Sound";
  }
};
