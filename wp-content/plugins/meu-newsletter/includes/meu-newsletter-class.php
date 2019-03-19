<?php 

class Meu_Newsletter_Widget extends WP_Widget
{

    
    public function __construct()
    {

        parent::__construct(

            'meu_newsletter_widget',

            esc_html__('Meu Newsletter', 'ns_nomain'),

            [

                'description'=>esc_html__('Meu Newsletter', 'ns_domain')


            ]

        );//end __construct

    }//END __construct





    public function widget( $args, $instance )
    {

        echo $args['before_widget'];
        echo $args['before_title'];

        if(!empty($instance['title'])) echo $instance['title'];
        
        echo $args['after_title'];

        echo '
        
            <div id="form-msg">

            </div>

            <form id="subscriber-form" method="post" action="'.plugins_url().'meu-newsletter/includes/newsletter-mailer.php'.'">
            
                <div class="form-grop">
                
                    <label for="name">Nome: </label>
                    <input type="text" id="name" name="name" class="form-control" required>

               
                
                    <label for="email">E-mail: </label>
                    <input type="text" id="email" name="email" class="form-control" required>

                
                
                    <input type="hidden" id="recipient" name="recipient" class="form-control" value="'.$instance['recipient'].'">
                    <input type="hidden" id="recipient" name="recipient" class="form-control" value="'.$instance['subject'].'">

                    <br>
                
                    <input type="submit" name="subscribe" class="btn btn-primary" value="Inscreva-se">

                    <br><br><br>

                </div>

            </form>
        
        ';

    }//END widget






    





    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] :__('Meu Nesletter', 'ns_domain');

        $recipient = $instance['recipient'];

        $subject = !empty($instance['subject']) ? $instance['subject'] : __('Você tem um novo inscrito!', 'ns_domain');

       
        ?>

        <p>
            <label for="<?=$this->get_field_id('recipient');?>"><?=__('Destinatario');?></label>
            <br>
            <input type="text" id="<?=$this->get_field_id('recipient');?>" name="<?=$this->get_field_name('recipient');?>" value="<?=esc_attr($recipient);?>">
        </p>

        <p>
            <label for="<?=$this->get_field_id('subject');?>"><?=__('Assunto');?></label>
            <br>
            <input type="text" id="<?=$this->get_field_id('subject');?>" name="<?=$this->get_field_name('subject');?>" value="<?=esc_attr($subject);?>">
        </p>

        <?php
       
    }//END form


    public function update( $new_instance,$old_instance )
    {

        $instance = [

            'title'=>(!empty($new_instance['title']) ? strip_tags($new_instance['title']) : ''),
            'recipient'=>(!empty($new_instance['recipient']) ? strip_tags($new_instance['recipient']) : ''),
            'subject'=>(!empty($new_instance['subject']) ? strip_tags($new_instance['subject']) : '')
            
        ];  


        return $instance;

    }//END update

}//END class Meu_Newsletter_Widget




?>