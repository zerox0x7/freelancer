/**
 * RTL fixes and adjustments for Chatify
 */
$(document).ready(function() {
    // Fix the floating direction of messages in RTL mode
    function fixRtlMessageDisplay() {
        // Ensure sent messages appear on the left in RTL layout
        $('.message-card.mc-sender').css({
            'float': 'left',
            'margin-left': '0',
            'margin-right': 'auto'
        });
        
        // Ensure received messages appear on the right in RTL layout
        $('.message-card:not(.mc-sender)').css({
            'float': 'right',
            'margin-right': '0',
            'margin-left': 'auto'
        });
    }

    // Apply fixes on document ready
    fixRtlMessageDisplay();
    
    // Re-apply fixes when new messages are loaded
    $(document).ajaxComplete(function() {
        fixRtlMessageDisplay();
    });
    
    // Convert any English digits to Arabic if needed
    function convertToArabicDigits(str) {
        return str
            .replace(/0/g, '٠')
            .replace(/1/g, '١')
            .replace(/2/g, '٢')
            .replace(/3/g, '٣')
            .replace(/4/g, '٤')
            .replace(/5/g, '٥')
            .replace(/6/g, '٦')
            .replace(/7/g, '٧')
            .replace(/8/g, '٨')
            .replace(/9/g, '٩');
    }
    
    // Custom handling for message timestamps if needed
    function updateTimestampsToArabic() {
        // Convert timestamps display to Arabic if needed
        $('.message-time .time').each(function() {
            // Uncomment the line below if you want to convert digits to Arabic
            // $(this).text(convertToArabicDigits($(this).text()));
        });
    }
    
    // Uncomment to use Arabic digits for timestamps
    // updateTimestampsToArabic();
    
    // Fix emoji picker positioning in RTL mode
    $('body').on('click', '.emoji-button', function() {
        setTimeout(function() {
            $('.emoji-picker').css({
                'right': 'auto',
                'left': '20px'
            });
        }, 100);
    });
}); 