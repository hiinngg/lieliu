export default {
   
  // count 任务总数量
// type today：当天完成　day：仅白天分配　curve：模拟曲线分配
// weightHour 权重数组
var setTaskCount = function(count, type, weightHour){
	weightHour = weightHour || [5,4,2,1,2,3,4,5,6,7,8,9,10,11,12,13,12,11,10,9,8,7,6,5];
	var getWeight = function(start, end){
			var a = 0;
			weightHour.forEach(function(i, index){
				if(index >= start && index <= end){
					a += i;
				}
			});
			return a;
		};
	var list = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
	var used = 0
		, start = 0
		, end = 23;
	switch(type){
		case 'clear':
			//清空
			return list;
		case 'today':
			var date = new Date()
				, hour = date.getHours();
			start = date.getMinutes() > 40 ? hour + 1 : hour;
			break;
		case 'day':
			start = 8;
			end = 18;
			//白天分配
			break;
		case 'curve':
			//曲线分配
			break;
	};
	var average = count / getWeight(start, end);
	var averageArr = [];
	list.forEach(function(item, index){
		if(index < 24 && index >= start && index <= end){
			var int = Math.floor(weightHour[index] * average);
			if(used < count){
				int = int > count - used ? count - used : int;
				list[index] = int;
				used += int;
			};
			averageArr.push({'index': index, 'value': weightHour[index]});
		}else{
			list[index] = 0;
		};
	});
	var duoyu = count - used;
	if(duoyu > 0){
		averageArr.sort(function(a, b){
			return a.value > b.value ? -1 : 1;
		});
		var i = 0;
		while( i < duoyu){
			if(!!averageArr[i]){
				list[averageArr[i].index] += 1;
			};
			i++;
		};
	};
	return list;
};



}