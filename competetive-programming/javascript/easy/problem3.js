/**
 * @param {number[]} prices
 * @return {number}
 */
var maxProfit = function (prices) {
  let min = prices[0];
  let maxProfit = 0;
  for (let i = 0; i < prices.length; i++) {
    if (prices[i] < min) {
      min = prices[i];
    } else {
      let diff = prices[i] - min;
      maxProfit = diff > maxProfit ? diff : maxProfit;
    }
  }
  return maxProfit;
};
