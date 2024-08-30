/**
 * @param {number[]} nums
 * @return {number}
 */
var majorityElement = function (nums) {
  let occurance = 0;
  let majority = Math.ceil(nums.length / 2);
  // const num1 = nums[0];
  // let num2;
  // for(let i = 1; i < nums.length; i++){
  //     if(nums[i]===num1){
  //         occurance++;
  //     }else{
  //         num2 = nums[i];
  //     }

  // }
  // if(occurance>=majority){
  //     return num1;
  // }
  // return num2;
  for (let i = 0; i < nums.length; i++) {
    for (let j = 0; j < nums.length; j++) {
      if (nums[i] === nums[j]) {
        occurance++;
      }
    }
    if (occurance >= majority) {
      return nums[i];
    }
    occurance = 0;
  }
};
