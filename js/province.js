// JavaScript Document
var provinceList = [
{name:'北京'},
{name:'上海'},
{name:'天津'},
{name:'重庆'},
{name:'四川'},
{name:'贵州'},
{name:'云南'},
{name:'西藏'},
{name:'河南'},
{name:'湖北'},
{name:'湖南'},
{name:'广东'},
{name:'广西'},
{name:'陕西'},
{name:'甘肃'},
{name:'青海'},
{name:'宁夏'},
{name:'新疆'},
{name:'河北'},
{name:'山西'},
{name:'内蒙古'},
{name:'江苏'},
{name:'浙江'},
{name:'安徽'},
{name:'福建'},
{name:'江西'},
{name:'山东'},
{name:'辽宁'},
{name:'吉林'},
{name:'黑龙江'},
{name:'海南'},
{name:'台湾'},
{name:'香港'},
{name:'澳门'},
{name:'海外'}
];

var provinceArray = new Array();
var provinceTag = document.getElementById("province");

function getProvince(){
	var provinceTag = document.getElementById("province");
	for(var i=0; i<provinceList.length; i++){　　　　//provinceList.length为省数组的长度，下标从0开始，所以定义var i=0
		var province = provinceList[i];　　　　　　　　　　//通过下标获取省列表（上面的列出列表）中的数据
		var provinceName = province.name;　　　　　　　　//根据 province.name获取省的名字
		provinceArray[i]=provinceName;　　　　　　　　　　　//将获得的省的名字注入到数组中去
		provinceTag.add(new Option(provinceName,i));　　　　//通过Option方法将省的名字与下标i对应，取出来。然后通过add()方法，将每一个名字放到provinceTag中
	}
}

function chooseProvince(th){　　　　　　　　//通过方法的调用来实现省 市之间的二级联动，th是我们设置的一个参数，方便下面进行使用，可以理解为province的一个元素（名字）
	var index = th.selectedIndex-1;　　　　　　　　　　//此处selectedIndex的索引减1是因为我们在写<select><option>按钮时  “请选择省”  占了一个索引，所以需要减1才能对应
	var provinceName = provinceArray[index];　　　　//通过数组下标获取数据（名字）
	for(var n=0; n<provinceList.length; n++){　　　　//通过循环遍历列表数组
		var provice = provinceList[n];　　　　　　　　　　　//通过列表下标获取数据
	}
}

