/**
 * @param {number[]} nums
 * @param {number} k
 * @return {void} Do not return anything, modify nums in-place instead.
 */
var rotate = function (nums, k) {
  if (k > nums.length) {
    while (k > nums.length) {
      k = k - nums.length;
    }
  } else if (nums.length === 1) {
    return;
  }
  const nums2 = [];
  let counter = 0;
  for (let i = nums.length - k; i < nums.length; i++) {
    nums2[counter] = nums[i];
    counter++;
  }
  console.log(nums2);
  for (let i = nums.length - 1; i >= k; i--) {
    nums[i] = nums[i - k];
  }
  for (let i = 0; i < k; i++) {
    nums[i] = nums2[i];
  }
};
