class MainController < ApplicationController
	before_filter :check_signed, only: [:sign_in]
	layout "inner_layout"
	def index
		render :layout=>"application"
	end

	def sign_in
		@user=User.where(:username=>params[:user][:username].downcase,:encrypted_password=>Digest::MD5.hexdigest(params[:user][:password]+"gitstud")).last
		if @user
			session[:user]=@user
			if @user.student_or_instructor_type=="Student"
				redirect_to dashboard_student_index_path
			else
				redirect_to dashboard_instructor_index_path
			end
		else
			flash[:alert]="Wrong username or password"
			redirect_to root_path and return
		end
	end

	def sign_out
		session[:user]=nil
		@user=nil
		flash[:info]="signed out!"
		redirect_to root_path
	end

	def sign
	end

	def sign_up
		check_signed
		
		params.permit!
		params[:user].each{|k,v| v.downcase! rescue v}
		@user=User.new(params[:user])
		@user.encrypted_password=Digest::MD5.hexdigest(params[:user][:password]+"gitstud")
		if params[:filter]=="student"
			@user.student_or_instructor=Student.create
		else
			@user.student_or_instructor=Instructor.create
		end
		if @user.save
			session[:user]=@user.id
			if @user.student_or_instructor_type=="Student"
				redirect_to dashboard_student_index_path,:flash => { :success => "user created!" } and return
			else
				redirect_to dashboard_instructor_index_path,:flash => { :success => "user created!" } and return
			end
		else
			redirect_to root_path,:flash => { :alert => "Could not create user!" } and return
		end
	end



	def check_signed
		if @user
			flash[:info]="you are already Signed in"
			if @user.student_or_instructor_type=="Student"
				redirect_to dashboard_student_index_path and return
			else
				redirect_to dashboard_instructor_index_path and return
			end
		end
	end
end
