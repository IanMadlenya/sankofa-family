        function isAlphaOrParen(str) {
            return /^[a-zA-Z()]+$/.test(str);
        }

        function isArabicNumber(str) {
            return /^[0-9]+$/.test(str);
        }
        
        function isAsianCharater(str) {
            return /[\u3400-\u9FBF]/.test(str);
        }