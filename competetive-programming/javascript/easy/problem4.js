/**
 * @param {number} x
 * @return {boolean}
 */
var isPalindrome = function (x) {
  if (x < 0) {
    return false;
  }
  let number = 0;
  let temp = x;
  while (temp > 0) {
    let d = temp % 10;
    temp = Math.floor(temp / 10);
    number = number * 10 + d;
  }

  if (number === x) {
    return true;
  }
  return false;
};
