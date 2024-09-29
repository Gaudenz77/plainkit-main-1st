<script src="../../assets/js/blockchain.js" defer></script>
 <!-- Main Content -->
 <div class="container mx-auto mt-8 mb-32">
      <div class="flex flex-col lg:flex-row justify-center">
        <!-- Left Column: Form for Creating Blockchain -->
        <div class="lg:w-1/4 w-full bg-white p-8 rounded shadow-lg">
          <h4 class="text-xl font-bold mb-4">Create a Block</h4>
          <form id="createBlockForm" onsubmit="return false;">
            <div class="mb-3">
              <label for="blockData" class="block text-sm font-medium text-gray-700">Block Data:</label>
              <textarea class="w-full border border-gray-300 rounded-lg p-2" id="blockData" required></textarea>
            </div>
            <div class="mb-3">
              <label for="blockValue" class="block text-sm font-medium text-gray-700">Block Value (Currency):</label>
              <input type="text" class="w-full border border-gray-300 rounded-lg p-2" id="blockValue" required />
            </div>
            <div class="mb-3">
              <label for="blockCurrency" class="block text-sm font-medium text-gray-700">Select Cryptocurrency:</label>
              <select class="w-full border border-gray-300 rounded-lg p-2" id="blockCurrency" required>
                <option value="bitcoin">Bitcoin (BTC)</option>
                <option value="ethereum">Ethereum (ETH)</option>
                <option value="litecoin">Litecoin (LTC)</option>
                <option value="poorcoin">Poor.Coin (POC)</option>
              </select>
            </div>
            <div class="text-center">
              <!-- Buy and Sell buttons -->
              <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4" 
                type="button" onclick="handleTransaction('buy')">
                Buy
              </button>
              <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 ml-2" 
                      type="button" onclick="handleTransaction('sell')">
                Sell
              </button>

            </div>
          </form>


  
          
        </div>

        <!-- Central Column: Blockchain Display Tables -->
        <div class="lg:w-3/4 w-full mt-6 lg:mt-0 rounded shadow-lg p-8">
          <h3 class="text-xl font-bold text-center mb-4">Bitcoin Blockchain</h3>
          <div class="overflow-x-auto">
            <div id="bitcoinBlockchainDisplay" class="mt-3"></div>
          </div>

          <h3 class="text-xl font-bold text-center mt-6 mb-4">Ethereum Blockchain</h3>
          <div class="overflow-x-auto">
            <div id="ethereumBlockchainDisplay" class="mt-3 "></div>
          </div>

          <h3 class="text-xl font-bold text-center mt-6 mb-4">Litecoin Blockchain</h3>
          <div class="overflow-x-auto">
            <div id="litecoinBlockchainDisplay" class="mt-3"></div>
          </div>

          <!-- Poor.Coin Blockchain Display -->
          <h3 class="text-xl font-bold text-center mt-6 mb-4">Poor.Coin Blockchain</h3>
          <div class="overflow-x-auto">
            <div id="poorcoinBlockchainDisplay" class="mt-3"></div>
          </div>
        </div>
      </div>

      <!-- General Form Below -->
      <div class="mt-8 flex justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full lg:w-2/3">
          <form>
            <div class="mb-4">
              <label for="floatingInput" class="block text-sm font-medium text-gray-700">Email Address</label>
              <input
                type="email"
                class="w-full border border-gray-300 rounded-lg p-2"
                id="floatingInput"
                placeholder="name@example.com"
              />
            </div>
            <div class="mb-4">
              <label for="floatingPassword" class="block text-sm font-medium text-gray-700">Password</label>
              <input
                type="password"
                class="w-full border border-gray-300 rounded-lg p-2"
                id="floatingPassword"
                placeholder="Password"
              />
            </div>
            <div class="text-center">
              <button
                type="button"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
              >
                Send
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>