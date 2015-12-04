class ApplicationController < ActionController::Base
  # Prevent CSRF attacks by raising an exception.
  # For APIs, you may want to use :null_session instead.
  protect_from_forgery with: :exception
  before_filter :clear_session
  before_filter :load_user


  def clear_session
  	if action_name=="sign_out"
  		session[:user]=nil
  	end
  end

  def load_user
  	if session[:user]
  		@user=User.find session[:user]
  	end
    return if !@user
    if @user.student_or_instructor_type=="Student"
      @current_student=@user.student_or_instructor
      else
       @current_instructor=@user.student_or_instructor
      end
  end

end
