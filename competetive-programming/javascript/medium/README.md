# Medium Problems

## Problem 1: Remove Duplicates from Sorted Array II

- Solution: [problem1.js](./problem1.js)
- Description: Given an integer array nums sorted in non-decreasing order, remove some duplicates in-place such that each unique element appears at most twice. The relative order of the elements should be kept the same.

Since it is impossible to change the length of the array in some languages, you must instead have the result be placed in the first part of the array nums. More formally, if there are k elements after removing the duplicates, then the first k elements of nums should hold the final result. It does not matter what you leave beyond the first k elements.

Return k after placing the final result in the first k slots of nums.

Do not allocate extra space for another array. You must do this by modifying the input array in-place with O(1) extra memory.

## Problem 2: Rotate Array

- Solution: [problem2.js](./problem2.js)
- Description: Given an integer array nums, rotate the array to the right by k steps, where k is non-negative.

Example 1:

```
Input: nums = [1,2,3,4,5,6,7], k = 3
Output: [5,6,7,1,2,3,4]
Explanation:
rotate 1 steps to the right: [7,1,2,3,4,5,6]
rotate 2 steps to the right: [6,7,1,2,3,4,5]
rotate 3 steps to the right: [5,6,7,1,2,3,4]
```

## Problem 3: Best Time to Buy and Sell Stock II

- Solution: [problem3.js](./problem3.js)
- Description: You are given an integer array prices where prices[i] is the price of a given stock on the ith day.

On each day, you may decide to buy and/or sell the stock. You can only hold at most one share of the stock at any time. However, you can buy it then immediately sell it on the same day.

Find and return the maximum profit you can achieve.

## Problem 4: Jump Game

- Solution: [problem4.js](./problem4.js)
- Description: You are given an integer array nums. You are initially positioned at the array's first index, and each element in the array represents your maximum jump length at that position.

Return true if you can reach the last index, or false otherwise.

## Problem 5: Maximal Score After Applying K Operations

- Solution: [problem5.js](./problem5.js)
- Description: You are given a 0-indexed integer array nums and an integer k. You have a starting score of 0.

In one operation:

    choose an index i such that 0 <= i < nums.length,
    increase your score by nums[i], and
    replace nums[i] with ceil(nums[i] / 3).

Return the maximum possible score you can attain after applying exactly k operations.

The ceiling function ceil(val) is the least integer greater than or equal to val.
