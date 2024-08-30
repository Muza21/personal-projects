/**
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function (nums) {
  let k = 1;
  let occurance = 1;
  for (let i = 1; i < nums.length; i++) {
    if (nums[i] === nums[i - 1]) {
      occurance++;
    } else {
      occurance = 1;
    }
    if (occurance <= 2) {
      nums[k] = nums[i];
      k++;
    }
  }
  return k;
};
