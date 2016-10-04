function initialize(){var a={center:myCenter,zoom:16,scrollwheel:!1,mapTypeId:google.maps.MapTypeId.ROADMAP},b=new google.maps.Map(document.getElementById("googleMap"),a),c=new google.maps.Marker({position:myCenter});c.setMap(b)}var myCenter=new google.maps.LatLng(-33.86859,151.2093);google.maps.event.addDomListener(window,"load",initialize),window.onscroll=function(){myFunction()};

 $(document).ready(function()
 {
     $('#george-box').qtip({
         content: {
             title: 'SMFOs董事总经理 George Gao',
             text: '高先生有着20年金融证券外汇从业和投资经验，历任中国投资银行，中信证券资产管理部交易员，长盛基金，华夏基金，融通基金，KVB，易汇通金融学院院长。持有注册会计师、注册证券分析师、澳洲RG146金融从业牌照。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
     
     $('#bridy-box').qtip({
         content: {
             title: 'SMFOs金融专家 Bridy Yue',
             text: '英国谢菲尔德大学研究生毕业，中国社科院金融所在读博士。历任中华全国青联委员，北京湖南商会副会长。在中国有十年信息系统管理，地产开发，及矿业风险投资从业经验。在澳洲有四年地产，金融及信贷经验。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
     
     $('#gracie-box').qtip({
         content: {
             title: 'SMFOs首席财务官 Gracie',
             text: '澳大利亚注册会计师CPA，特许税务师 CTA，注册税务代理 Registered tax agent ，注册会计师导师 ，超过10年的澳大利亚会计和税务从业经验，擅长中小型企业税务规划，企业业务结构重组，企业跨境税务规划，高净值客户的个人税务理财等。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
     
     $('#wei-box').qtip({
         content: {
             title: 'SMFOs金融专家 Wei',
             text: '曾在国内大型国有上市公司做过近十年的财务会计审计工作。澳洲国立大学商业贸易硕士学位。先后在会计公司，投资咨询公司做市场管理。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
     
     $('#vincent-box').qtip({
         content: {
             title: 'SMFOs销售经理 Vincent Xu',
             text: '悉尼大学金融与计量金融硕士学位。有多年的金融行业从业经验和丰富的投资经验，擅长数据分析和风险把控。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
     
     $('#su-box').qtip({
         content: {
             title: 'SMFOs中国区销售总监 苏振',
             text: '苏先生有近10年的资产配置及移民留学从业经验，历任国内央企，新东方等机构的市场销售及管理工作，有着丰富的市场销售及管理经验，成功帮助数以千计的中国客户走向海外。'
         },
         style: {
            classes: 'qtip-tipsy'
        },
         position: {
             target: 'mouse', // Track the mouse as the positioning target
             adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
         },
        show: {
            effect: function() {
                $(this).fadeTo(250, 1);
            }
        },
        hide: {
            effect: function() {
                $(this).fadeTo(250, 0);
            }
        }
     });
 });