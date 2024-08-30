"use strict";
/**
 * @param {number[]} nums
 * @return {number}
 */
var removeDuplicates = function (nums) {
  const newarr = [...new Set(nums)];
  for (let i = 0; i < newarr.length; i++) {
    nums[i] = newarr[i];
  }
  nums.splice(newarr.length, nums.length - newarr.length);
  return nums.length;
};
