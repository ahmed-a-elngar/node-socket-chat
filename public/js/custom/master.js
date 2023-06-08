
let bgColors = ['primary', 'info', 'danger', 'warning', 'dark', 'light', 'success'];
Object.freeze(bgColors);

function getRandomBgColor(execpt)
{    
    index = getRandomFromRange(0, bgColors.length);
    while( index == execpt)
    {
        index = getRandomFromRange(0, bgColors.length);
    }

    return 'btn-inverse-' + bgColors[index];
}

function getRandomFromRange(minimum, maximum)
{
    return Math.floor(Math.random() * (maximum - minimum) + minimum);
}

function getBgColorsIndex(target_value)
{
    for (let index = 0; index < bgColors.length; index++) {
        let current_value = bgColors[index];
        if(current_value.toLowerCase() == target_value.toLowerCase().trim())
        {
            return index;
        }
    }
    return -1;
}