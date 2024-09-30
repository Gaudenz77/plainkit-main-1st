const sha256 = CryptoJS.SHA256;

class Block {
  constructor(index, timestamp, data, previousHash = "") {
    this.index = index;
    this.timestamp = timestamp;
    this.data = data;
    this.previousHash = previousHash;
    this.hash = this.calculateHash();
    this.nonce = 0;
  }

  calculateHash() {
    return sha256(
      this.index +
        this.timestamp +
        JSON.stringify(this.data) +
        this.previousHash +
        this.nonce
    ).toString();
  }

  mineBlock(difficulty) {
    const target = Array(difficulty + 1).join("0");
    while (this.hash.substring(0, difficulty) !== target) {
      this.nonce++;
      this.hash = this.calculateHash();
    }
    console.log(`Block mined: ${this.hash}`);
  }

  static fromObject(obj) {
    const newBlock = new Block(
      obj.index,
      obj.timestamp,
      obj.data,
      obj.previousHash
    );
    newBlock.hash = obj.hash;
    newBlock.nonce = obj.nonce;
    return newBlock;
  }
}

class Blockchain {
  constructor(currency) {
    this.currency = currency;
    this.difficulty = 4;
    this.chain = this.retrieveBlockchain() || [this.createGenesisBlock()];
  }

  createGenesisBlock() {
    return new Block(0, new Date().toLocaleString(), "Genesis Block", "0");
  }

  getLatestBlock() {
    return this.chain[this.chain.length - 1];
  }

  addBlock(newBlock) {
    newBlock.previousHash = this.getLatestBlock().hash;
    newBlock.mineBlock(this.difficulty);
    this.chain.push(newBlock);
    this.saveBlockchain();
  }

  saveBlockchain() {
    localStorage.setItem(this.currency, JSON.stringify(this.chain));
  }

  retrieveBlockchain() {
    const storedBlockchain = localStorage.getItem(this.currency);
    return storedBlockchain
      ? JSON.parse(storedBlockchain).map(Block.fromObject)
      : null;
  }
}

// Initialize blockchains for each cryptocurrency
const blockchains = {
  bitcoin: new Blockchain("bitcoin"),
  ethereum: new Blockchain("ethereum"),
  litecoin: new Blockchain("litecoin"),
  poorcoin: new Blockchain("poorcoin"),
};

// Function to create and add a block for the selected cryptocurrency
function createBlockchain(action) {
  const blockData = document.getElementById("blockData").value;
  const blockValueInput = parseFloat(
    document.getElementById("blockValue").value
  );
  const blockCurrency = document.getElementById("blockCurrency").value;

  if (isNaN(blockValueInput)) {
    alert("Please enter a valid block value.");
    return;
  }

  const blockValue =
    action === "sell" ? -Math.abs(blockValueInput) : blockValueInput;
  const newBlock = new Block(
    blockchains[blockCurrency].chain.length,
    new Date().toLocaleString(),
    { data: blockData, value: blockValue }
  );

  blockchains[blockCurrency].addBlock(newBlock);
  displayBlockchain(blockCurrency);

  // Clear the form after submission
  document.getElementById("createBlockForm").reset();
}

// Handle buy/sell transaction
function handleTransaction(action) {
  createBlockchain(action);
  alert(action === "buy" ? "Buy confirmed" : "Sell confirmed");
}

// Function to create table headers
function createTableHeaders(headers) {
  const headerRow = document.createElement("tr");
  headers.forEach((headerText) => {
    const header = document.createElement("th");
    header.textContent = headerText;
    headerRow.appendChild(header);
  });
  return headerRow;
}

// Function to create table row
function createTableRow(rowData) {
  const row = document.createElement("tr");
  rowData.forEach((data) => {
    const cell = document.createElement("td");
    cell.textContent = data;
    row.appendChild(cell);
  });
  return row;
}

// Function to display the blockchain for the selected cryptocurrency
function displayBlockchain(currency) {
  const blockchainDisplay = document.getElementById(
    `${currency}BlockchainDisplay`
  );
  blockchainDisplay.innerHTML = ""; // Clear previous display

  const table = document.createElement("table");
  table.className = "table table-striped-columns myTable";
  table.appendChild(
    createTableHeaders([
      "Block Number",
      "Timestamp",
      "Data",
      "Hash",
      "Previous Hash",
    ])
  );

  let totalValue = 0;
  blockchains[currency].chain.forEach((block) => {
    const rowData = [
      block.index,
      block.timestamp,
      JSON.stringify(block.data),
      block.hash,
      block.previousHash,
    ];
    totalValue += block.data?.value || 0;
    table.appendChild(createTableRow(rowData));
  });

  // Adding a row to display the total value of the blockchain
  const totalRow = createTableRow([
    `Total Value: ${totalValue} ${currency.toUpperCase()}`,
  ]);
  totalRow.cells[0].colSpan = 5;
  table.appendChild(totalRow);

  blockchainDisplay.appendChild(table);
}

// Display all blockchains on page load
window.onload = () => {
  Object.keys(blockchains).forEach(displayBlockchain);
};

/* --------------------- Ither stuff */
/* document.addEventListener('DOMContentLoaded', () => {
  const themeSelect = document.getElementById('themeSelect');

  // Listen for dropdown change
  themeSelect.addEventListener('change', function () {
    const selectedTheme = this.value;
    document.documentElement.setAttribute('data-theme', selectedTheme);
  });
}); */
