if ($facebook == 'yes') {
    echo '<a target="_blank" class="eead-social-share-link eead-facebook" href="http://www.facebook.com/sharer/sharer.php?u=' . esc_url($url) . '&amp;t=' . esc_html($title) . '">';
    echo $hide_icon != 'yes' ? '<i class="eead-icon icofont-facebook"></i>' : null;
    echo $hide_text != 'yes' ? '<span class="eead-social-share-text">Facebook</span>' : null;
    echo '</a>';
}
if ($twitter == 'yes') {
    echo '<a target="_blank" class="eead-social-share-link eead-twitter" href="https://twitter.com/intent/tweet?text=' . esc_html($title) . '&url=' . $url . '">';
    echo $hide_icon != 'yes' ? '<i class="eead-icon icofont-twitter"></i>' : null;
    echo $hide_text != 'yes' ? '<span class="eead-social-share-text">Twitter</span>' : null;
    echo '</a>';
}
if ($pintrest == 'yes') {
    echo '<a target="_blank" class="eead-social-share-link eead-pinterest" href="http://pinterest.com/pin/create/button/?url=' . esc_url($url) . '">';
    echo $hide_icon != 'yes' ? '<i class="eead-icon icofont-pinterest"></i>' : null;
    echo $hide_text != 'yes' ? '<span class="eead-social-share-text">Pintrest</span>' : null;
    echo '</a>';
}
if ($linkedin == 'yes') {
    echo '<a target="_blank" class="eead-social-share-link eead-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=' . esc_url($url) . '&title=' . esc_html($title) . '">';
    echo $hide_icon != 'yes' ? '<i class="eead-icon icofont-linkedin"></i>' : null;
    echo $hide_text != 'yes' ? '<span class="eead-social-share-text">Linkedin</span>' : null;
    echo '</a>';
}
